<?php

use PHPUnit\Framework\TestCase;
use Tetris\Controller\KeyboardController;
use Tetris\Event\HitLeftEvent;
use Tetris\Event\HitRightEvent;
use Tetris\GameManager;
use Tetris\Tetrimino\Tetrimino;
use Tetris\Tetrimino\STetrimino;

class ControlTest extends TestCase
{
	/**
	 * @dataProvider toEventProvider
	 */
    public function testControlFromKeyboardToEvent($key, $expected) {
		$controller = new KeyboardController();
		$controller = $controller->hit($key);
		$events = $controller->toEvents();
		$this->assertEquals($expected, $events[0]);
    }

	public function toEventProvider()
	{
		return [
			[KeyboardController::KEY_LEFT, new HitLeftEvent()],
			[KeyboardController::KEY_RIGHT, new HitRightEvent()]
		];
	}

	/**
	 * @dataProvider MoveTetriminoProvider
	 */
	public function testMoveTetrimino($keys, Tetrimino $tetrimino, $expected)
	{
		$controller = new KeyboardController();
		foreach($keys as $key) {
			$controller = $controller->hit($key);
		}
		$manager = new GameManager(controlled: $tetrimino);
		$manager = $manager->process($controller->toEvents());
		$this->assertEquals($expected, $manager->render());
	}

	public function MoveTetriminoProvider()
	{
		return [
			[
				[KeyboardController::KEY_RIGHT],
				new STetrimino(8, 3, Tetrimino::DEGREE_90),
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
					"□□□□■□□□□□",
					"□□□□■■□□□□",
					"□□□□□■□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
				]
			],
			[
				[
					KeyboardController::KEY_LEFT,
					KeyboardController::KEY_RIGHT,
					KeyboardController::KEY_LEFT,
				],
				new STetrimino(8, 3, Tetrimino::DEGREE_90),
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
					"□□■□□□□□□□",
					"□□■■□□□□□□",
					"□□□■□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
					"□□□□□□□□□□",
				]
			],
		];
	}
}