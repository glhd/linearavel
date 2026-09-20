<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectAttachmentEdge */
class ProjectAttachmentEdge extends Data
{
	public function __construct(public Optional|ProjectAttachment $node, public Optional|string $cursor)
	{
	}
}
