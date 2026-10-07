<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationQuotaFilter */
class OrganizationQuotaFilterInput
{
	public function __construct(
		public ?StringComparatorInput $key = null,
		/** @var iterable<OrganizationQuotaFilterInput>|Collection<int, OrganizationQuotaFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<OrganizationQuotaFilterInput>|Collection<int, OrganizationQuotaFilterInput> */
		public ?iterable $or = null
	) {
	}
}
