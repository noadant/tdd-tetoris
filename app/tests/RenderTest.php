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

	/**
	 * @dataProvider renderNotEmptyProvider
	 */
	public function testRenderNotEmpty(array $expected, Tetrimino $tetrimino)
	{
		$area = new Area();
		$area = $area->placeBlock(0, 3)
					 ->placeBlock(0, 4)
					 ->placeBlock(0, 5)
					 ->placeBlock(0, 6);
		$manager = new GameManager($area, $tetrimino);
		$this->assertEquals($expected, $manager->render());
	}

	public function renderNotEmptyProvider()
	{
		return [
			[
				[
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
				],
				new STetrimino(5, 4, Tetrimino::DEGREE_90)
			],
			[
				[
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
					"□□□■■□□□□□",
					"□□■■□□□□□□",
					"□□□□□□□□□□",
					"□□□■■■■□□□",
				],
				new STetrimino(3, 3, Tetrimino::DEGREE_180)
			],
		];
	}
}