<?php

namespace Glhd\Linearavel\Responses;

use Illuminate\Support\Collection;
use Illuminate\Support\Traits\ForwardsCalls;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

/**
 * @template TAbstractData of Data
 * @mixin TAbstractData
 */
abstract class LinearResponse extends Response
{
	use ForwardsCalls;
	
	protected Data|Collection|null $resolved = null;
	
	abstract public function resolve(): Data|Collection;
	
	public function __get(string $name)
	{
		return data_get($this->implicitlyResolve(), $name);
	}
	
	public function __call(string $method, array $parameters): mixed
	{
		return $this->forwardCallTo($this->implicitlyResolve(), $method, $parameters);
	}
	
	protected function implicitlyResolve(): Data|Collection
	{
		return $this->resolved ??= $this->resolve();
	}
}
