<?php
namespace Tetris\Controller;

use Tetris\Event\HitLeftEvent;

class KeyboardController
{
	public function hit(string $key) : self
	{
		return new self();
	}

	public function toEvents() : array
	{
		return [
			new HitLeftEvent()
		];
	}
}