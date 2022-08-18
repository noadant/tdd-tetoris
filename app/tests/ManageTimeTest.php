<?php

use PHPUnit\Framework\TestCase;
use Tetris\GameManager;
use Tetris\Area;
use Tetris\Tetrimino\Tetrimino;
use Tetris\Tetrimino\STetrimino;

class ManageTimeTest extends TestCase
{
    public function testGetTime() {
		$timestamp = time();
		$manager = new GameManager(timestamp: $timestamp);
		$this->assertEquals($timestamp, $manager->getTime());
    }

	public function testSpendTime() {
		$timestamp = time();
		$manager = new GameManager(timestamp: $timestamp);
		$nextManager = $manager->process();
		$this->assertNotEquals($manager->getTime(), $nextManager->getTime());
	}
}