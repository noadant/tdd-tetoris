<?php
namespace Tetris;

class Square
{
	const RENDER_CHAR_BLOCK = "■";
	const RENDER_CHAR_EMPTY = "□";

	readonly private bool $hasBlock;

	public function __construct(bool $hasBlock = false) {
		$this->hasBlock = $hasBlock;
	}

	public function hasBlock() : bool
	{
		return $this->hasBlock;
	}

	public function render() : string
	{
		return $this->hasBlock ? self::RENDER_CHAR_BLOCK : self::RENDER_CHAR_EMPTY;
	}
}