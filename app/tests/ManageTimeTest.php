<?php

use PHPUnit\Framework\TestCase;
use Tetris\GameManager;
use Tetris\Area;
use Tetris\Tetrimino\Tetrimino;
use Tetris\Tetrimino\STetrimino;

class ManageTimeTest extends TestCase
{
    public function testGetTime() {
		$time = time();
		$manager = new GameManager();
		$this->assertEquals($time, $manager->getTime());
    }
}