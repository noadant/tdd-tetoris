<?php

use PHPUnit\Framework\TestCase;
use Tetris\GameManager;
use Tetris\Area;
use Tetris\Tetrimino\Tetrimino;
use Tetris\Tetrimino\STetrimino;

class RenderTest extends TestCase
{
    public function testRenderBackground() {
		$manager = new GameManager();
		$this->assertEquals([
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
		], $manager->render());
    }

	public function testRenderNotEmpty()
	{
		$area = new Area();
		$area = $area->placeBlock(0, 3)
					 ->placeBlock(0, 4)
					 ->placeBlock(0, 5)
					 ->placeBlock(0, 6);
		$tetrimono = new STetrimino(Tetrimino::DEGREE_90, 5, 4);
		$manager = new GameManager($area, $tetrimono);
		$this->assertEquals([
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□■□□□□□",
			"□□□□■■□□□□",
			"□□□□□■□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
			"□□□■■■■□□□",
		], $manager->render());
	}
}