<?php

use PHPUnit\Framework\TestCase;
use Tetris\GameManager;

class RenderTest extends TestCase
{
    public function testRenderBackground() {
		$manager = new GameManager();
		$this->assertEquals(
			$manager->render(), [
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
			]
		);
    }
}