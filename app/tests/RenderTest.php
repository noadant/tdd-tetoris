<?php

use PHPUnit\Framework\TestCase;
use Tetris\GameManager;
use Tetris\Area;

class RenderTest extends TestCase
{
    public function testRenderBackground() {
		$manager = new GameManager();
		$this->assertEquals([
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
		], $manager->render());
    }

	public function testRenderNotEmpty()
	{
		$area = new Area();
		$area = $area->placeBlock(6, 3)
					 ->placeBlock(6, 4)
					 ->placeBlock(6, 5)
					 ->placeBlock(6, 6);
		$manager = new GameManager($area);
		$this->assertEquals([
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
			["□□□■■■■□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
			["□□□□□□□□□□"],
		], $manager->render());
	}
}