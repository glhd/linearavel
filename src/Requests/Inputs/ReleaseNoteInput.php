<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseNoteInput */
class ReleaseNoteInput
{
	public function __construct(public string $content, public ?string $title = null)
	{
	}
}
