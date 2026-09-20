<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerSortInput */
class CustomerSortInput
{
	public function __construct(public ?NameSortInput $name = null, public ?CustomerCreatedAtSortInput $createdAt = null, public ?OwnerSortInput $owner = null, public ?CustomerStatusSortInput $status = null, public ?RevenueSortInput $revenue = null, public ?SizeSortInput $size = null, public ?TierSortInput $tier = null, public ?ApproximateNeedCountSortInput $approximateNeedCount = null)
	{
	}
}
