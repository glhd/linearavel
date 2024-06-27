<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/FavoriteUpdateInput */
class FavoriteUpdateInput
{
	public function __construct(public ?float $sortOrder = null, public ?string $parentId = null, public ?string $folderName = null)
	{
	}
}
