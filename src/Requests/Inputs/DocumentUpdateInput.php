<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/DocumentUpdateInput */
class DocumentUpdateInput
{
	public function __construct(public ?string $title = null, public ?string $icon = null, public ?string $color = null, public ?string $content = null, public ?string $projectId = null, public ?string $issueId = null, public ?string $releaseId = null, public ?string $lastAppliedTemplateId = null, public ?string $ownerId = null, public ?DateTimeInterface $hiddenAt = null, public ?float $sortOrder = null, public ?bool $trashed = null)
	{
	}
}
