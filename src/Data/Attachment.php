<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\ExternalUser, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\Contracts\Node;
class Attachment extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $title, public Optional|string|null $subtitle, public Optional|string $url, public Optional|User|null $creator, public Optional|ExternalUser|null $externalUserCreator, public Optional|JSONObject $metadata, public Optional|JSONObject|null $source, public Optional|string|null $sourceType, public Optional|bool $groupBySource, public Optional|Issue $issue)
    {
    }
}
