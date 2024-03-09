<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AttachmentEdge extends Data
{
	function __construct(public Optional|Attachment $node, public Optional|string $cursor)
	{
	}
}
