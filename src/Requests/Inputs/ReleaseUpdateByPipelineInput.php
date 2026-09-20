<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseUpdateByPipelineInput */
class ReleaseUpdateByPipelineInput
{
	public function __construct(
		public string $pipelineId,
		public ?string $version = null,
		public ?string $stage = null,
		public ?string $name = null,
		public ?string $description = null,
		/** @var iterable<ReleaseLinkInput>|Collection<int, ReleaseLinkInput> */
		public ?iterable $links = null,
		/** @var iterable<ReleaseDocumentInput>|Collection<int, ReleaseDocumentInput> */
		public ?iterable $documents = null,
		public ?ReleaseNoteInput $releaseNotes = null
	) {
	}
}
