<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PaginationNulls;
use Glhd\Linearavel\Data\Enums\PaginationSortOrder;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/PrioritySort */
class PrioritySortInput
{
	public function __construct(public ?PaginationNulls $nulls = null, public ?PaginationSortOrder $order = null, public ?bool $noPriorityFirst = null)
	{
	}
}
