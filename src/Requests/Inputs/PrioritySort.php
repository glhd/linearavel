<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PaginationNulls;
use Glhd\Linearavel\Data\Enums\PaginationSortOrder;

class PrioritySort
{
	public function __construct(public ?PaginationNulls $nulls = null, public ?PaginationSortOrder $order = null, public ?bool $noPriorityFirst = null)
	{
	}
}
