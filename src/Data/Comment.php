<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\DocumentContent, Glhd\Linearavel\Data\ProjectUpdate, Glhd\Linearavel\Data\Comment, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\ExternalUser, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\CommentConnection, Glhd\Linearavel\Data\ActorBot, Glhd\Linearavel\Data\Contracts\Node;
class Comment extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $body, public Optional|Issue|null $issue, public Optional|DocumentContent|null $documentContent, public Optional|ProjectUpdate|null $projectUpdate, public Optional|Comment|null $parent, public Optional|User|null $resolvingUser, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $resolvedAt, public Optional|Comment|null $resolvingComment, public Optional|User|null $user, public Optional|ExternalUser|null $externalUser, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $editedAt, public Optional|string $bodyData, public Optional|string|null $quotedText, public Optional|string|null $summaryText, public Optional|JSONObject $reactionData, public Optional|string $url, public Optional|CommentConnection $children, public Optional|ActorBot|null $botActor)
    {
    }
}
