<?php

namespace Glhd\Linearavel\Responses;

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
	
	protected string $name;
	
	/** @var class-string<TAbstractData> */
	protected string $class;
	
	protected ?Data $resolved;
	
	public function __get(string $name)
	{
		return data_get($this->resolve(), $name);
	}
	
	public function __call(string $method, array $parameters): mixed
	{
		return $this->forwardCallTo($this->resolve(), $method, $parameters);
	}
	
	public function withConfiguration(string $name, string $class): static
	{
		$this->name = $name;
		$this->class = $class;
		
		return $this;
	}
}
