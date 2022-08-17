<?php
namespace Tetris;

class GameManager
{
	readonly private Area $area;

	public function __construct(Area $area = new Area()) {
		$this->area = $area;
	}

	public function render() : array
	{
		return $this->area->render();
	}
}