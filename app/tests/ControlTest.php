<?php

use PHPUnit\Framework\TestCase;
use Tetris\Controller\KeyboardController;
use Tetris\Event\HitLeftEvent;
use Tetris\Event\HitRightEvent;

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
}