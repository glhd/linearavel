<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\PaginationNulls;
use Glhd\Linearavel\Data\Enums\PaginationSortOrder;

class ManualSortInput
{
	public function __construct(public ?PaginationNulls $nulls = null, public ?PaginationSortOrder $order = null)
	{
	}
}
