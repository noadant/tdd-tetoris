<?php
namespace Tetris;

use Tetris\Event\HitLeftEvent;
use Tetris\Event\HitRightEvent;
use Tetris\Tetrimino\STetrimino;
use Tetris\Tetrimino\Tetrimino;

class GameManager
{
	readonly private Area $area;
	readonly private Tetrimino $controlled;
	readonly private GameConfig $config;
	readonly private float $timestamp;

	public function __construct(
		Area $area = new Area(),
		Tetrimino $controlled = null,
		GameConfig $config = new GameConfig(),
		float $timestamp = null
	) {
		$this->area = $area;
		$this->controlled = $controlled ?? new STetrimino(21, 5, Tetrimino::DEGREE_90);
		$this->config = $config;
		$this->timestamp = $timestamp ?? microtime(true);
	}

	public function process(array $events = []) : self
	{
		$manager = $this->fallProcess();
		foreach ($events as $event) {
			if(get_class($event) === HitRightEvent::class) {
				$manager = $manager->onHitRight();
			} else if(get_class($event) === HitLeftEvent::class) {
				$manager = $manager->onHitLeft();
			}
		}
		return $manager;
	}

	private function fallProcess() : self
	{
		$diffTime = microtime(true) - $this->getTime();
		$notFallingTime = $diffTime + $this->controlled->getNotFallingTime();
		$controlled = $this->controlled;
		while($notFallingTime >= $this->config->fall_tetrimino_time) {
			$controlled = $controlled->fall();
			$notFallingTime -= $this->config->fall_tetrimino_time;
		}
		$controlled = $controlled->setNotFallingTime($notFallingTime);
		return new self($this->area, $controlled, $this->config);
	}

	public function onHitRight() : self
	{
		$controlled = $this->controlled->moveRight();
		return new self($this->area, $controlled, $this->config);
	}

	public function onHitLeft() : self
	{
		$controlled = $this->controlled->moveLeft();
		return new self($this->area, $controlled, $this->config);
	}

	public function render() : array
	{
		return $this->area->placeTetrimino($this->controlled)->render();
	}

	public function getTime() : float
	{
		return $this->timestamp;
	}
}