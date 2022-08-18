<?php
namespace Tetris;

use Tetris\Tetrimino\Tetrimino;

class GameManager
{
	readonly private Area $area;
	readonly private ?Tetrimino $controlled;

	public function __construct(Area $area = new Area(), Tetrimino $controlled = null) {
		$this->area = $area;
		$this->controlled = $controlled;
	}

	public function render() : array
	{
		return $this->area->placeTetrimino($this->controlled)->render();
	}
}