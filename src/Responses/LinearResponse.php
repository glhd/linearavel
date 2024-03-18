<?php

namespace Glhd\Linearavel\Responses;

use Illuminate\Support\Collection;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

/**
 * @template T of Data
 */
abstract class LinearResponse extends Response
{
	protected string $name;
	
	/** @var class-string<T> */
	protected string $class;
	
	protected ?Data $resolved;
	
	/** @return T */
	abstract public function resolve(): Collection|Data;
	
	public function __get(string $name)
	{
		return data_get($this->resolve(), $name);
	}
	
	public function withConfiguration(string $name, string $class): static
	{
		$this->name = $name;
		$this->class = $class;
		
		return $this;
	}
}
