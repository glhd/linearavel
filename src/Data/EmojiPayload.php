<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/EmojiPayload */
class EmojiPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Emoji $emoji, public Optional|bool $success)
	{
	}
}
