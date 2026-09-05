<?php

namespace Glhd\Linearavel\Responses;

use Illuminate\Support\Collection;
use Illuminate\Support\Traits\ForwardsCalls;
use RuntimeException;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

/**
 * @template TAbstractData of Data
 * @mixin TAbstractData
 */
abstract class LinearResponse extends Response
{
	use ForwardsCalls;

	protected ?object $resolved = null;

	/**
	 * Resolve the response into the data object it represents.
	 *
	 * Generated responses narrow this to a concrete data class, a Collection, or—for
	 * union types—the interface shared by the union's members. The return type is
	 * `object` so that all three stay valid narrowings.
	 *
	 * @return Data|Collection<int, Data>|object
	 */
	abstract public function resolve(): object;

	public function __get(string $name)
	{
		return data_get($this->implicitlyResolve(), $name);
	}

	public function __call(string $method, array $parameters): mixed
	{
		return $this->forwardCallTo($this->implicitlyResolve(), $method, $parameters);
	}

	/**
	 * Turn a GraphQL union into the concrete data object it represents, using
	 * the `__typename` field to work out which member type came back.
	 *
	 * @param array<string, mixed>|null $data
	 * @param array<string, class-string<Data>> $members GraphQL type name to data class
	 */
	protected function resolveUnion(?array $data, array $members): Data
	{
		$typename = $data['__typename'] ?? null;

		if (! isset($members[$typename])) {
			throw new RuntimeException(
				null === $typename
					? 'Cannot resolve a union without a "__typename" field. Request it explicitly, or use the default fields.'
					: "Unexpected union member '{$typename}'. Expected one of: ".implode(', ', array_keys($members)).'.'
			);
		}

		return $members[$typename]::from($data);
	}

	/**
	 * @param array<int, array<string, mixed>>|null $data
	 * @param array<string, class-string<Data>> $members
	 * @return Collection<int, Data>
	 */
	protected function resolveUnionCollection(?array $data, array $members): Collection
	{
		return collect($data ?? [])
			->map(fn(array $item) => $this->resolveUnion($item, $members))
			->values();
	}

	protected function implicitlyResolve(): object
	{
		return $this->resolved ??= $this->resolve();
	}
}
