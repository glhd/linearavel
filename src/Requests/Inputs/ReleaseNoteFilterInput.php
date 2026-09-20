<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseNoteFilter */
class ReleaseNoteFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $title = null,
		public ?StringComparatorInput $slugId = null,
		public ?ReleasePipelineFilterInput $pipeline = null,
		public ?ReleaseFilterInput $release = null,
		/** @var iterable<ReleaseNoteFilterInput>|Collection<int, ReleaseNoteFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReleaseNoteFilterInput>|Collection<int, ReleaseNoteFilterInput> */
		public ?iterable $or = null
	) {
	}
}
