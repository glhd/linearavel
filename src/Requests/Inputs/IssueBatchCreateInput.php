<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueBatchCreateInput */
class IssueBatchCreateInput
{
	public function __construct(
		/** @var iterable<IssueCreateInput>|Collection<int, IssueCreateInput> */
		public iterable $issues
	) {
	}
}
