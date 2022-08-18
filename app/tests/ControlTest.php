<?php

use PHPUnit\Framework\TestCase;
use Tetris\Controller\KeyboardController;
use Tetris\Event\HitLeftEvent;

class ControlTest extends TestCase
{
    public function testControlFromKeyboardToEvent() {
		$key = '1b5b44'; //キーボードの左
		$controller = new KeyboardController();
		$controller = $controller->hit($key);
		$events = $controller->toEvents();
		$this->assertEquals(new HitLeftEvent(), $events[0]);
    }
}