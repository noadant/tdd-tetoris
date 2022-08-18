<?php

namespace Tetris\Tetrimino;

use Tetris\Area;

abstract class Tetrimino
{
	const DEGREE_0   = 0;
	const DEGREE_90  = 90;
	const DEGREE_180 = 180;
	const DEGREE_270 = 270;
	readonly protected int $row;
	readonly protected int $col;
	readonly protected int $degree;

	public function __construct(int $row, int $col, int $degree = self::DEGREE_0)
	{
		$this->row = $row;
		$this->col = $col;
		$this->degree = $degree;
	}

	public function render(): Area
	{
		return match ($this->degree) {
			self::DEGREE_0 => $this->renderDegree0(),
			self::DEGREE_90 => $this->renderDegree90(),
			self::DEGREE_180 => $this->renderDegree180(),
			self::DEGREE_270 => $this->renderDegree270(),
		};
	}

	abstract protected function renderDegree0(): Area;

	abstract protected function renderDegree90(): Area;

	abstract protected function renderDegree180(): Area;

	abstract protected function renderDegree270(): Area;
}