<?php

namespace Glhd\Linearavel\Requests\Inputs;

class EmojiCreateInput
{
	public function __construct(public string $name, public string $url, public ?string $id = null)
	{
	}
}
