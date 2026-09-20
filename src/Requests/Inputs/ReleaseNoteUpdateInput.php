<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseNoteUpdateInput */
class ReleaseNoteUpdateInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $releaseIds = null,
		public ?string $rangeFromReleaseId = null,
		public ?string $rangeToReleaseId = null,
		public ?string $title = null,
		public ?string $content = null
	) {
	}
}
