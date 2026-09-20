<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomersConfigurationInput */
class CustomersConfigurationInput
{
	public function __construct(
		public ?string $defaultTeamId = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $hiddenSources = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $excludeList = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $ignoreList = null,
		public ?string $revenueDisplay = null,
		public ?string $revenueCurrencyCode = null,
		public ?CustomersAttributesDataSourceConfigurationInput $attributesDataSourceConfiguration = null
	) {
	}
}
