<?php

namespace Glhd\Linearavel\Requests\Inputs;

class AttachmentUpdateInput
{
	function __construct(public string $title, public ?string $subtitle = null, public ?string $metadata = null, public ?string $iconUrl = null)
	{
	}
}
