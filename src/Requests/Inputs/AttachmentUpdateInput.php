<?php

namespace Glhd\Linearavel\Requests\Inputs;

class AttachmentUpdateInput
{
	public function __construct(public string $title, public ?string $subtitle = null, public ?string $metadata = null, public ?string $iconUrl = null)
	{
	}
}
