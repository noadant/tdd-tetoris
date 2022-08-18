<?php
namespace Tetris;

class GameConfig
{
	readonly public float $fall_tetrimino_time;

	public function __construct(
		float $fall_tetrimino_time = 1.0,
	) {
		$this->fall_tetrimino_time = $fall_tetrimino_time;
	}
}