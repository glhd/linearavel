<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseDebugSinkInput */
class ReleaseDebugSinkInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $inspectedShas,
		public string $issues,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $pullRequests,
		public ?string $revertedIssues = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $includePaths = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $includeSubjects = null,
		public ?string $issuePattern = null
	) {
	}
}
