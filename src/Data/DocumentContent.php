<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\ProjectMilestone, Glhd\Linearavel\Data\Document, Glhd\Linearavel\Data\Contracts\Node;
class DocumentContent extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string|null $content, public Optional|JSONObject|null $contentData, public Optional|string|null $contentState, public Optional|Issue|null $issue, public Optional|Project|null $project, public Optional|ProjectMilestone|null $projectMilestone, public Optional|Document|null $document, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $restoredAt)
    {
    }
}
