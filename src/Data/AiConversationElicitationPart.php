<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationBasePart;
use Glhd\Linearavel\Data\Contracts\AiConversationPart;
use Glhd\Linearavel\Data\Enums\AiConversationElicitationKind;
use Glhd\Linearavel\Data\Enums\AiConversationPartType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationElicitationPart */
class AiConversationElicitationPart extends Data implements AiConversationBasePart, AiConversationPart
{
	public function __construct(
		public Optional|string $id,
		public Optional|AiConversationPartType $type,
		public Optional|AiConversationPartMetadata $metadata,
		public Optional|AiConversationElicitationKind $kind,
		/** @var Collection<int, AiConversationElicitationOption> */
		public Optional|Collection $options,
		public Optional|string|null $title,
		public Optional|string|null $serverUrl,
		public Optional|AiConversationMcpServerConnectionScope|null $scope,
		public Optional|string|null $integrationId
	) {
	}
}
