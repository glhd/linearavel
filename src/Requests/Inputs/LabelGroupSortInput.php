<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PaginationNulls;
use Glhd\Linearavel\Data\Enums\PaginationSortOrder;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/LabelGroupSort */
class LabelGroupSortInput
{
	public function __construct(public string $labelGroupId, public ?PaginationNulls $nulls = null, public ?PaginationSortOrder $order = null)
	{
	}
}
