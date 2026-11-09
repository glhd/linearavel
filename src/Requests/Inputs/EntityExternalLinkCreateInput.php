<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EntityExternalLinkCreateInput */
class EntityExternalLinkCreateInput
{
	public function __construct(public string $url, public string $label, public ?string $id = null, public ?string $initiativeId = null, public ?string $projectId = null, public ?string $releaseId = null, public ?float $sortOrder = null)
	{
	}
}
