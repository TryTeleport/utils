<?php
namespace Teleport\Utils;

class Alias
{

	/**
	 * Create multi aliases of class
	 *
	 * @param  string $class
	 * @param  array  $aliases
	 * @param  bool $autoload
	 * @return void
	 */
	public static function create(string $class, array $aliases, bool $autoload = false): void
	{
		foreach ($aliases as $alias)
		{
			\class_alias($class, $alias, $autoload);
		}
	}
}
