<?php
namespace Teleport\Utils;


final class Raw
{
	/**
	 * @var string
	 */
	private $raw

	/**
	 * @var array
	 */
	, $params;

	public static function __construct(string $raw, array $params = [])
	{
		$this->raw = $raw;
		$this->params = $params;
	}

	public function getRaw(): string
	{
		return $this->raw;
	}

	public function getParams(): array
	{
		return $this->params;
	}
}
