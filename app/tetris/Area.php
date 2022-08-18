<?php
namespace Tetris;

use Tetris\Tetrimino\Tetrimino;

class Area
{
	readonly private array $rows;

	public function __construct(array $rows = null) {
		$this->rows = $rows ?? array_fill(0, 20, $this->generateEmptyRow());
	}

	public function generateEmptyRow() : array
	{
		return array_fill(0, 10, new Square());
	}

	public function placeBlock(int $row, int $col) : self
	{
		$rows = $this->rows;
		$row_index = count($rows) - $row - 1;
		$rows[$row_index][$col] = new Square(true);
		return new self($rows);
	}

	public function placeTetrimino(?Tetrimino $tetrimino) : self
	{
		if(!$tetrimino) return $this;
		return $this->placeBlock(4,5)
					->placeBlock(5, 4)
					->placeBlock(5, 5)
					->placeBlock(6, 4);
	}

	public function render() : array
	{
		return array_map(
			fn($row) => implode('', array_map(
				fn(Square $square) => $square->render(), $row)
			),
			$this->rows
		);
	}
}