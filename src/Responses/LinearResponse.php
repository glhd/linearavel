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

	protected mixed $resolved = null;

	protected bool $has_resolved = false;

	/**
	 * Resolve the response into the value it represents.
	 *
	 * Generated responses narrow this to a concrete data class, a Collection, the
	 * interface shared by a union's members, or—for root fields that return a
	 * GraphQL scalar—a PHP scalar. The return type is `mixed` so that all of
	 * those stay valid narrowings.
	 *
	 * @return Data|Collection<int, Data>|object|string|int|float|bool|null
	 */
	abstract public function resolve(): mixed;

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

	protected function implicitlyResolve(): mixed
	{
		// Not `??=`: a response that resolves to null would otherwise resolve on every access
		if (! $this->has_resolved) {
			$this->resolved = $this->resolve();
			$this->has_resolved = true;
		}

		return $this->resolved;
	}
}
