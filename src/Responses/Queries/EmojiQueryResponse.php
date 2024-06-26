<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Emoji;
use Glhd\Linearavel\Responses\LinearResponse;

class EmojiQueryResponse extends LinearResponse
{
	public function resolve(): Emoji
	{
		return Emoji::from($this->json('data.emoji'));
	}
}
