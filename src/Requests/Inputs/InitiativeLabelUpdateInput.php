<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeLabelUpdateInput */
class InitiativeLabelUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $parentId = null, public ?string $color = null, public ?bool $isGroup = null, public ?DateTimeInterface $retiredAt = null)
	{
	}
}
