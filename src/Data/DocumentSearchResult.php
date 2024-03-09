<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\Template, Glhd\Linearavel\Data\JSON, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\Contracts\Node;
class DocumentSearchResult extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $title, public Optional|string|null $icon, public Optional|string|null $color, public Optional|User $creator, public Optional|User $updatedBy, public Optional|Project $project, public Optional|string $slugId, public Optional|Template|null $lastAppliedTemplate, public Optional|float $sortOrder, public Optional|string|null $content, public Optional|string|null $contentState, public Optional|JSON|null $contentData, public Optional|JSONObject $metadata)
    {
    }
}
