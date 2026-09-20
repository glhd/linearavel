<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationBasePart;
use Glhd\Linearavel\Data\Contracts\AiConversationElicitationResponseData;
use Glhd\Linearavel\Data\Contracts\AiConversationPart;
use Glhd\Linearavel\Data\Enums\AiConversationPartType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationElicitationResponsePart */
class AiConversationElicitationResponsePart extends Data implements AiConversationBasePart, AiConversationPart
{
	public function __construct(public Optional|string $id, public Optional|AiConversationPartType $type, public Optional|AiConversationPartMetadata $metadata, public Optional|string $elicitationId, public Optional|AiConversationElicitationResponseData $data, public Optional|string|null $bodyData, public Optional|User|null $user)
	{
	}
}
