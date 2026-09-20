<?php

namespace Glhd\Linearavel\Support;

use BackedEnum;
use DateTimeInterface;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Traversable;
use UnitEnum;

/**
 * Converts PHP values into the two representations the Linear API understands:
 * JSON for GraphQL variables, and GraphQL literals for inline arguments.
 */
class GraphValue
{
	/**
	 * Convert a PHP value into something that can be JSON-encoded as a GraphQL variable.
	 *
	 * Enums become their backing value, dates become RFC 3339 strings, and input
	 * objects become associative arrays. Nulls are stripped from objects so that
	 * unset input properties are omitted rather than sent as explicit nulls.
	 */
	public static function toVariable(mixed $value): mixed
	{
		return match (true) {
			$value instanceof BackedEnum => $value->value,
			$value instanceof UnitEnum => $value->name,
			$value instanceof DateTimeInterface => $value->format(DateTimeInterface::RFC3339_EXTENDED),
			$value instanceof JsonSerializable => static::toVariable($value->jsonSerialize()),
			$value instanceof Arrayable => static::toVariable($value->toArray()),
			$value instanceof Traversable => static::toVariable(iterator_to_array($value)),
			is_object($value) => static::objectToVariable($value),
			is_array($value) => static::arrayToVariable($value),
			default => $value,
		};
	}

	/**
	 * Convert a PHP value into a GraphQL literal, for arguments that are
	 * inlined into the query rather than passed as variables.
	 */
	public static function toLiteral(mixed $value, int $depth = 0): string
	{
		// Enum values are bare names in GraphQL—never quoted strings
		if ($value instanceof UnitEnum) {
			return $value->name;
		}

		$value = static::toVariable($value);

		if (is_array($value)) {
			return array_is_list($value)
				? static::listLiteral($value, $depth)
				: static::objectLiteral($value, $depth);
		}

		return json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
	}

	protected static function objectToVariable(object $value): array
	{
		return static::arrayToVariable(get_object_vars($value));
	}

	protected static function arrayToVariable(array $value): array
	{
		$result = [];

		foreach ($value as $key => $item) {
			// Unset input properties are omitted rather than sent as explicit nulls
			if (null === $item) {
				continue;
			}

			$result[$key] = static::toVariable($item);
		}

		// Filtering can leave holes in a list, so re-index if we started with one
		return array_is_list($value)
			? array_values($result)
			: $result;
	}

	protected static function listLiteral(array $value, int $depth): string
	{
		$items = array_map(fn($item) => static::toLiteral($item, $depth), $value);

		return '['.implode(', ', $items).']';
	}

	protected static function objectLiteral(array $value, int $depth): string
	{
		$indent = "\t\t".str_repeat("\t", $depth);

		$pairs = [];

		foreach ($value as $key => $item) {
			$pairs[] = "{$key}: ".static::toLiteral($item, $depth + 1);
		}

		if (! count($pairs)) {
			return '{}';
		}

		return "{\n{$indent}\t".implode(",\n{$indent}\t", $pairs)."\n{$indent}}";
	}
}
