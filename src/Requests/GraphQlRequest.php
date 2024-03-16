<?php

namespace Glhd\Linearavel\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

abstract class GraphQlRequest extends Request implements HasBody
{
	use HasJsonBody;
	
	protected Method $method = Method::POST;
	
	abstract protected function gql(): string;
	
	public function resolveEndpoint(): string
	{
		return '/';
	}
	
	protected function fields(array $keys, int $depth = 0): string
	{
		return collect($keys)
			->unless($depth, fn($keys) => $keys->flip()->undot())
			->map(function($value, $key) use ($depth) {
				$line = $key;
				
				if (is_array($value)) {
					$line .= " {\n".$this->fields($value, $depth + 1)."\n}";
				}
				
				return $line;
			})
			->implode("\n");
	}
	
	protected function defaultBody(): array
	{
		return ['query' => $this->gql()];
	}
}
