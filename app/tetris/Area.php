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
		if($rows[$row_index][$col] ?? false) {
			$rows[$row_index][$col] = new Square(true);
		}
		return new self($rows);
	}

	public function placeTetrimino(?Tetrimino $tetrimino) : self
	{
		if(!$tetrimino) return $this;
		return $this->merge($tetrimino->render());
	}

	public function merge(self $area) : self
	{
		$rows = $this->rows;
		foreach($this->rows as $i => $row) {
			/** @var Square $square */
			foreach($row as $j => $square) {
				//todo 被った時にException投げる
				$rows[$i][$j] = new Square(
					$square->hasBlock() || $area->getSquare($i ,$j)->hasBlock()
				);
			}
		}
		return new self($rows);
	}

	public function getSquare(int $row, int $col) : Square
	{
		return $this->rows[$row][$col];
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