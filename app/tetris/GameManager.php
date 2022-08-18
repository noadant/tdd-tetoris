<?php
namespace Tetris;

use Tetris\Tetrimino\Tetrimino;

class GameManager
{
	readonly private Area $area;
	readonly private ?Tetrimino $controlled;
	readonly private float $timestamp;

	public function __construct(
		Area $area = new Area(),
		Tetrimino $controlled = null,
		float $timestamp = null
	) {
		$this->area = $area;
		$this->controlled = $controlled;
		$this->timestamp = $timestamp ?? microtime(true);
	}

	public function process() : self
	{
		//todo 処理が早すぎる時にテスト失敗する可能性を見越してusleepしておく
		usleep(1);
		return new self($this->area, $this->controlled);
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