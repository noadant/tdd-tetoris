<?php

namespace Tetris\Tetrimino;

use Tetris\Area;

class STetrimino extends Tetrimino
{
	protected function renderDegree0(): Area
	{
		//todo
		return new Area();
	}

	protected function renderDegree90(): Area
	{
		return (new Area())
			->placeBlock($this->row, $this->col)
			->placeBlock($this->row, $this->col + 1)
			->placeBlock($this->row + 1, $this->col)
			->placeBlock($this->row - 1, $this->col + 1);
	}

	protected function renderDegree180(): Area
	{
		return (new Area())
			->placeBlock($this->row, $this->col)
			->placeBlock($this->row, $this->col + 1)
			->placeBlock($this->row - 1, $this->col)
			->placeBlock($this->row - 1, $this->col - 1);
	}

	protected function renderDegree270(): Area
	{
		//todo
		return new Area();
	}
}