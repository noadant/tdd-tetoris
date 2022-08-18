<?php
namespace Tetris\Controller;

use Tetris\Event\HitLeftEvent;
use Tetris\Event\HitRightEvent;

class KeyboardController
{
	const KEY_LEFT = '1b5b44';
	const KEY_RIGHT = '1b5b43';

	readonly private array $keys;

	public function __construct(array $keys = []) {
		$this->keys = $keys;
	}

	public function hit(string $key) : self
	{
		$keys = $this->keys;
		$keys[] = $key;
		return new self($keys);
	}

	public function toEvents() : array
	{
		return array_map(fn($key) => $this->toEvent($key), $this->keys);
	}

	private function toEvent($key)
	{
		return match($key) {
			self::KEY_LEFT => new HitLeftEvent(),
			self::KEY_RIGHT => new HitRightEvent(),
			default => null
		};
	}
}