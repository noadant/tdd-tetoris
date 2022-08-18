<?php
namespace Tetris;

use Tetris\Tetrimino\Tetrimino;

class GameManager
{
	readonly private Area $area;
	readonly private ?Tetrimino $controlled;
	readonly private int $timestamp;

	public function __construct(
		Area $area = new Area(),
		Tetrimino $controlled = null,
		int $timestamp = null
	) {
		$this->area = $area;
		$this->controlled = $controlled;
		$this->timestamp = $timestamp ?? time();
	}

	public function render() : array
	{
		return $this->area->placeTetrimino($this->controlled)->render();
	}

	public function getTime() : int
	{
		return $this->timestamp;
	}
}