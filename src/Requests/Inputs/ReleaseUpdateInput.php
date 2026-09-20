<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseUpdateInput */
class ReleaseUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $version = null, public ?string $commitSha = null, public ?string $pipelineId = null, public ?string $stageId = null, public ?string $startDate = null, public ?string $targetDate = null, public ?DateTimeInterface $startedAt = null, public ?DateTimeInterface $completedAt = null, public ?bool $trashed = null)
	{
	}
}
