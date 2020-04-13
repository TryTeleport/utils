<?php
namespace Teleport\Utils;


class Env
{

	/**
	 * Load env from directory.
	 *
	 * @param  string $dir
	 * @param  string $envFile
	 * @param  bool   $typed
	 * @return void
	 */
	public static function load(string $dir, string $envFile = ".env.ini", bool $typed = true): void
	{
		if (file_exists($file = $dir . DIRECTORY_SEPARATOR . $envFile) === false) {

			throw new \Exception("Unable to load env file: {$file}");
		}

		foreach (parse_ini_file($file, false, $typed ? INI_SCANNER_TYPED : INI_SCANNER_NORMAL) as $k => $v)
		{
			static::set($k, $v);
		}
	}

	/**
	 * Get form env
	 *
	 * @param  string $k
	 * @param  scalar $default
	 * @return mixed
	 */
	public static function get(string $k, $default = null)
	{
		if (isset($_ENV[$k])) {
			return $_ENV[$k];
		}

		return getenv($k) ?: $default;
	}

	/**
	 * Set env value
	 *
	 * @param  string $k
	 * @param  scalar $v
	 * @return bool
	 */
	public static function set(string $k, $v): bool
	{
		$_ENV[$k] = $v;

		return putenv("{$k}={$v}");
	}

	/**
	 * Check server api type (eg: apache, cli, cgi).
	 *
	 * @param  string  $sapi
	 * @return bool
	 */
	public static function is(string $sapi): bool
	{
		return (substr(PHP_SAPI, 0, strlen($sapi)) === $sapi);
	}
}
