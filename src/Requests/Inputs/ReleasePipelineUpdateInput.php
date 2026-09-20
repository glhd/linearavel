<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ReleasePipelineType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleasePipelineUpdateInput */
class ReleasePipelineUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $slugId = null,
		public ?ReleasePipelineType $type = null,
		public ?bool $isProduction = null,
		public ?bool $autoGenerateReleaseNotesOnCompletion = null,
		public ?bool $rolloverIssuesOnCompletion = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $includePathPatterns = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $teamIds = null
	) {
	}
}
