<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

abstract class LinearRequest extends Request implements HasBody
{
	use HasJsonBody;
	
	protected Method $method = Method::POST;
	
	protected ?string $response = LinearResponse::class;
	
	public function resolveEndpoint(): string
	{
		return '/';
	}
	
	abstract protected function gql(): string;
	
	protected function fields(array $keys, int $depth = 0): string
	{
		return collect($keys)
			->unless($depth, fn ($keys) => $keys->flip()->undot())
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
