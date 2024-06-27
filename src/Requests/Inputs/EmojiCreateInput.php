<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmojiCreateInput */
class EmojiCreateInput
{
	public function __construct(public string $name, public string $url, public ?string $id = null)
	{
	}
}
