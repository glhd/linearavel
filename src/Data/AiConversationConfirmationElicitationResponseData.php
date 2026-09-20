<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationElicitationResponseData;
use Glhd\Linearavel\Data\Enums\AiConversationElicitationKind;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationConfirmationElicitationResponseData */
class AiConversationConfirmationElicitationResponseData extends Data implements AiConversationElicitationResponseData
{
	public function __construct(public Optional|AiConversationElicitationKind $kind, public Optional|bool $confirmed)
	{
	}
}
