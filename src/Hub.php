<?php
namespace Teleport\Utils;

class Hub
{
	/**
	 * Hub items.
	 * @var array
	 */
	protected $items = [];

	/**
	 * Init with default hub object.
	 *
	 * @param object $default
	 */
	public function __construct(object $default)
	{
		$this->items['default'] = $default;
	}

	/**
	 * Add item to the hub.
	 *
	 * @param string $id     [description]
	 * @param object $object [description]
	 */
	public function add(string $id, object $object): static
	{
		$this->items[$id] = $object;
		return $this;
	}

	/**
	 * Get hub item by id.
	 *
	 * @param  string $id
	 * @return object
	 */
	public function on(string $id): object
	{
		return $this->items[$id];
	}

	/**
	 * Call a func from default object.
	 *
	 * @param  string $method
	 * @param  array  $args
	 * @return mixed
	 */
	public function __call(string $method, array $args)
	{
		return $this->on('default')->$method(...$args);
	}
}