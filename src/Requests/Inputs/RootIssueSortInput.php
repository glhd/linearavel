<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PaginationNulls;
use Glhd\Linearavel\Data\Enums\PaginationSortOrder;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/RootIssueSort */
class RootIssueSortInput
{
	public function __construct(public IssueSortInput $sort, public ?PaginationNulls $nulls = null, public ?PaginationSortOrder $order = null)
	{
	}
}
