<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UserUpdateInput */
class UserUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $displayName = null, public ?string $avatarUrl = null, public ?string $description = null, public ?string $title = null, public ?string $statusEmoji = null, public ?string $statusLabel = null, public ?DateTimeInterface $statusUntilAt = null, public ?string $timezone = null)
	{
	}
}
