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
	readonly protected float $not_falling_time;

	public function __construct(
		int $row,
		int $col,
		int $degree = self::DEGREE_0,
		float $not_falling_time = 0
	) {
		$this->row = $row;
		$this->col = $col;
		$this->degree = $degree;
		$this->not_falling_time = $not_falling_time;
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

	public function setNotFallingTime(float $not_falling_time = 0) : static
	{
		return new static($this->row, $this->col, $this->degree, $not_falling_time);
	}

	public function getNotFallingTime() : float
	{
		return $this->not_falling_time;
	}

	public function fall() : static
	{
		return new static($this->row - 1, $this->col, $this->degree, $this->not_falling_time);
	}

	abstract protected function renderDegree0(): Area;

	abstract protected function renderDegree90(): Area;

	abstract protected function renderDegree180(): Area;

	abstract protected function renderDegree270(): Area;
}