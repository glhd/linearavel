<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/DocumentSortInput */
class DocumentSortInput
{
	public function __construct(public ?DocumentTitleSortInput $title = null, public ?DocumentCreatorSortInput $creator = null, public ?DocumentProjectSortInput $project = null, public ?DocumentCreatedAtSortInput $createdAt = null, public ?DocumentUpdatedAtSortInput $updatedAt = null)
	{
	}
}
