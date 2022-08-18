<?php

use PHPUnit\Framework\TestCase;
use Tetris\GameManager;
use Tetris\Area;
use Tetris\Tetrimino\Tetrimino;
use Tetris\Tetrimino\STetrimino;
use Tetris\GameConfig;

class ManageTimeTest extends TestCase
{
    public function testGetTime() {
		$timestamp = microtime(true);
		$manager = new GameManager(timestamp: $timestamp);
		$this->assertEquals($timestamp, $manager->getTime());
    }

	public function testSpendTime() {
		$timestamp = microtime(true);
		$manager = new GameManager(timestamp: $timestamp);
		$nextManager = $manager->process();
		$this->assertNotEquals($manager->getTime(), $nextManager->getTime());
	}

	public function testFallTetrimino() {
		$config = new GameConfig(fall_tetrimino_time: 0.5);
		$tetrimino = new STetrimino(5, 5, Tetrimino::DEGREE_90);
		$manager = new GameManager(controlled: $tetrimino, config: $config);
		sleep(1);
		$nextManager = $manager->process();
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
			"□□□□□■□□□□",
			"□□□□□■■□□□",
			"□□□□□□■□□□",
			"□□□□□□□□□□",
			"□□□□□□□□□□",
		], $nextManager->render());
	}
}