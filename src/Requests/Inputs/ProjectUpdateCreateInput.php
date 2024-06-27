<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ProjectUpdateHealthType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectUpdateCreateInput */
class ProjectUpdateCreateInput
{
	public function __construct(
		public string $projectId,
		public ?string $id = null,
		public ?string $body = null,
		public ?string $bodyData = null,
		public ?ProjectUpdateHealthType $health = null,
		public ?bool $isDiffHidden = null
	) {
	}
}
