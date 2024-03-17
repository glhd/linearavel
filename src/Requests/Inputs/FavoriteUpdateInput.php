<?php

namespace Glhd\Linearavel\Requests\Inputs;

class FavoriteUpdateInput
{
	public function __construct(public ?float $sortOrder = null, public ?string $parentId = null, public ?string $folderName = null)
	{
	}
}
