<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\EmojiConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class EmojisResponse extends LinearResponse
{
	public function resolve(): EmojiConnection
	{
		return EmojiConnection::from($this->json('data.emojis'));
	}
}
