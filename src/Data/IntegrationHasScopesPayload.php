<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IntegrationHasScopesPayload */
class IntegrationHasScopesPayload extends Data
{
	public function __construct(
		public Optional|bool $hasAllScopes,
		/** @var Collection<int, string> */
		public Optional|Collection|null $missingScopes
	) {
	}
}
