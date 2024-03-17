<?php

namespace Glhd\Linearavel\Responses;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

class LinearResponse extends Response
{
	protected string $name;
	
	/** @var class-string<Data> */
	protected string $class;
	
	protected bool $collect;
	
	protected ?Data $resolved;
	
	public function resolve(): Data|Connection
	{
		return $this->resolved ??= $this->collect
			? $this->class::collect($this->json("data.{$this->name}"), Collection::class)
			: $this->class::from($this->json("data.{$this->name}"));
	}
	
	public function __get(string $name)
	{
		return data_get($this->resolve(), $name);
	}
	
	public function withConfiguration(string $name, string $class, bool $collect): static
	{
		$this->name = $name;
		$this->class = $class;
		$this->collect = $collect;
		
		return $this;
	}
}
