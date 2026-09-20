<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmojiSortInput */
class EmojiSortInput
{
	public function __construct(public ?EmojiCreatedAtSortInput $createdAt = null)
	{
	}
}
