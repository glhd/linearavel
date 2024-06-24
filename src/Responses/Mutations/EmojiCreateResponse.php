<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EmojiPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class EmojiCreateResponse extends LinearResponse
{
	public function resolve(): EmojiPayload
	{
		return EmojiPayload::from($this->json('data.emojiCreate'));
	}
}
