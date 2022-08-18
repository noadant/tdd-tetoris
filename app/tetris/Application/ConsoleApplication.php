<?php
namespace Tetris\Application;

use Tetris\Controller\KeyboardController;
use Tetris\GameManager;

class ConsoleApplication
{
	private $old_stty;

	public function __construct() {
		$this->old_stty = shell_exec('stty -g');

		// キーボード入力時エンターを回避、入力内容を出力しない
		shell_exec("stty -icanon -echo");
		stream_set_blocking(STDIN, false);
	}

	public function __destruct()
	{
		system('stty ' . $this->old_stty);
		stream_get_contents(STDIN);
	}

	public function run()
	{
		system('clear'); //コンソールを綺麗にする

		ob_start();
		$controller = new KeyboardController();
		$game_manager = new GameManager();
		while ($game_manager) {
			echo "\e[2;0H"; //カーソルをトップへ
			foreach($game_manager->render() as $row) {
				echo $row . PHP_EOL;
			}
			ob_flush(); //echoを一斉出力
			usleep(200); //パソコン熱々になるので5fpsで
			if($input = $this->getInput()) $controller = $controller->hit($input);
			$game_manager = $game_manager->process($controller->toEvents());
			$controller = new KeyboardController();
		}
		ob_end_flush();
	}

	//拾い物
	private function getInput() : ?string
	{
		$read = [STDIN];
		$write = [];
		$except = [];

		$result = stream_select($read, $write, $except, 0);

		if($result === false) {
			throw new \Exception('stream_select failed');
		}

		if($result === 0) {
			return null;
		}

		return bin2hex(stream_get_contents(STDIN));
	}
}