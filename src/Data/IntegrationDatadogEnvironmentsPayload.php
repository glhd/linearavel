<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IntegrationDatadogEnvironmentsPayload */
class IntegrationDatadogEnvironmentsPayload extends Data
{
	public function __construct(
		/** @var Collection<int, IntegrationDatadogEnvironment> */
		public Optional|Collection $environments
	) {
	}
}
