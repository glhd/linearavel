<?php

namespace Glhd\Linearavel\Responses;

use Saloon\Http\Response;
use Spatie\LaravelData\Data;

/**
 * @template TAbstractData of Data
 */
abstract class LinearResponse extends Response
{
	protected string $name;
	
	/** @var class-string<TAbstractData> */
	protected string $class;
	
	protected ?Data $resolved;
	
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
