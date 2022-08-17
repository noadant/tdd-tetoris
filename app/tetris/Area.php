<?php
namespace Tetris;

class Area
{
	readonly private array $rows;

	public function __construct(array $rows = null) {
		$this->rows = $rows ?? [
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
		];
	}

	public function placeBlock(int $row, int $col) : self
	{
		$rows = $this->rows;
		$row_index = count($rows) - $row - 1;
		$rows[$row_index] = substr_replace($rows[$row_index], "■", $col*3, 3);
		return new self($rows);
	}

	public function render() : array
	{
		return $this->rows;
	}
}