<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\LabelGroupType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueLabelCreateInput */
class IssueLabelCreateInput
{
	public function __construct(public string $name, public ?string $id = null, public ?string $description = null, public ?string $color = null, public ?string $parentId = null, public ?bool $isGroup = null, public ?DateTimeInterface $retiredAt = null, public ?LabelGroupType $groupType = null, public ?string $teamId = null)
	{
	}
}
