<?php
namespace Tetris;

use Tetris\Tetrimino\STetrimino;

class Application
{
	public function run()
	{
		system('clear'); //コンソールを綺麗にする

		ob_start();
		$game_manager = new GameManager();
		while ($game_manager) {
			echo "\e[2;0H"; //カーソルをトップへ
			foreach($game_manager->render() as $row) {
				echo $row . PHP_EOL;
			}
			ob_flush(); //echoを一斉出力
			usleep(200); //パソコン熱々になるので5fpsで
			$game_manager = $game_manager->process();
		}
		ob_end_flush();
	}
}