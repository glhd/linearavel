<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CommentUpdateInput */
class CommentUpdateInput
{
	public function __construct(public ?string $body = null, public ?string $quotedText = null)
	{
	}
}
