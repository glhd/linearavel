<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeLabelCreateInput */
class InitiativeLabelCreateInput
{
	public function __construct(public string $name, public ?string $id = null, public ?string $description = null, public ?string $color = null, public ?string $parentId = null, public ?bool $isGroup = null, public ?DateTimeInterface $retiredAt = null)
	{
	}
}
