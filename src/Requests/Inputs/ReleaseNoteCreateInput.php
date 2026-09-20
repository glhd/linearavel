<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseNoteCreateInput */
class ReleaseNoteCreateInput
{
	public function __construct(
		public string $pipelineId,
		public ?string $id = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $releaseIds = null,
		public ?string $rangeFromReleaseId = null,
		public ?string $rangeToReleaseId = null,
		public ?string $title = null,
		public ?string $content = null
	) {
	}
}
