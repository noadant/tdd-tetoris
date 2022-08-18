<?php

namespace Tetris\Tetrimino;

abstract class Tetrimino
{
	const DEGREE_0   = 0;
	const DEGREE_90  = 90;
	const DEGREE_180 = 180;
	const DEGREE_270 = 270;
	readonly private int $row;
	readonly private int $col;
	readonly private int $degree;

	public function __construct(int $row, int $col, int $degree = self::DEGREE_0)
	{
		$this->row = $row;
		$this->col = $col;
		$this->degree = $degree;
	}

	public function render(): array
	{
		return match ($this->degree) {
			self::DEGREE_0 => $this->renderDegree0(),
			self::DEGREE_90 => $this->renderDegree90(),
			self::DEGREE_180 => $this->renderDegree180(),
			self::DEGREE_270 => $this->renderDegree270(),
		};
	}

	abstract function renderDegree0(): array;

	abstract function renderDegree90(): array;

	abstract function renderDegree180(): array;

	abstract function renderDegree270(): array;
}