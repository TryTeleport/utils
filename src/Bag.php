<?php
namespace Teleport\Utils;

/**
 * Data Bag Class
 */
class Bag
{
	protected $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	/**
	 * Change current tag.
	 *
	 * @param  string $tag
	 * @return Bag
	 */
	public function tag(string $tag)
	{
		$this->tag = $tag;
		return $this;
	}

	/**
	 * Get things with the current tag.
	 *
	 * @param  string $id
	 * @param  mixed $default
	 * @return mixed
	 */
	public function get(string $id, $default = null)
	{
		return $this->data[$this->tag][$id] ?? $default;
	}
}
