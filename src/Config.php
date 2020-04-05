<?php
namespace Teleport\Utils;

class Config
{
	/**
	 * @var array
	 */
	protected static $config = [];

	/**
	 * Config prefix path
	 * @var string
	 */
	public static $prefix;

	/**
	 * Get and load config by id.
	 *
	 * @param  string $id
	 * @param  bool   $save
	 * @return array
	 */
	public static function &get(string $id, bool $save = true): array
	{
		if (\isset(static::$config[$id])) {

			return static::$config[$id];

		} elseif ($config = static::load($id)) {

			if ($save) {

				static::$config[$id] = $config;
			}

			return static::$config[$id];
		}

		throw \excep()->notFound($id);
	}

	/**
	 * Delete loaded config by id.
	 *
	 * @param  string $id
	 * @return void
	 */
	public static function del(string $id): void
	{
		\unset(static::$config[$id]);
	}

	/**
	 * Load config by id if exists
	 *
	 * @param  string $id
	 * @return null|array
	 */
	public static function load(string $id)
	{
		if (\file_exists($config = static::$prefix . \str_replace('.', DIRECTORY_SEPARATOR, $id) . '.config.php')) {

			return require($config);
		}

		return null;
	}

	/**
	 * Get all loaded config
	 *
	 * @return array
	 */
	public static function &all(): array
	{
		return static::$config;
	}
}
