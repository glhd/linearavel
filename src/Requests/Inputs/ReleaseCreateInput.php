<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseCreateInput */
class ReleaseCreateInput
{
	public function __construct(public string $name, public string $pipelineId, public ?string $id = null, public ?string $description = null, public ?string $version = null, public ?string $commitSha = null, public ?string $stageId = null, public ?string $startDate = null, public ?string $targetDate = null, public ?DateTimeInterface $createdAt = null, public ?DateTimeInterface $startedAt = null, public ?DateTimeInterface $completedAt = null)
	{
	}
}
