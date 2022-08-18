<?php
namespace Tetris;

use Tetris\Tetrimino\STetrimino;
use Tetris\Tetrimino\Tetrimino;

class GameManager
{
	readonly private Area $area;
	readonly private Tetrimino $controlled;
	readonly private GameConfig $config;
	readonly private float $timestamp;

	public function __construct(
		Area $area = new Area(),
		Tetrimino $controlled = null,
		GameConfig $config = new GameConfig(),
		float $timestamp = null
	) {
		$this->area = $area;
		$this->controlled = $controlled ?? new STetrimino(21, 5, Tetrimino::DEGREE_90);
		$this->config = $config;
		$this->timestamp = $timestamp ?? microtime(true);
	}

	public function process() : self
	{
		//todo 処理が早すぎる時にテスト失敗する可能性を見越してusleepしておく
		usleep(1);
		$diffTime = microtime(true) - $this->getTime();
		$notFallingTime = $diffTime + $this->controlled->getNotFallingTime();
		$controlled = $this->controlled;
		while($notFallingTime >= $this->config->fall_tetrimino_time) {
			$controlled = $controlled->fall();
			$notFallingTime -= $this->config->fall_tetrimino_time;
		}
		$controlled = $controlled->setNotFallingTime($notFallingTime);
		return new self($this->area, $controlled, $this->config);
	}

	public function render() : array
	{
		return $this->area->placeTetrimino($this->controlled)->render();
	}

	public function getTime() : float
	{
		return $this->timestamp;
	}
}