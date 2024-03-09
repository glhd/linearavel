<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Favorite, Glhd\Linearavel\Data\ProjectTab, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\FavoriteConnection, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\Cycle, Glhd\Linearavel\Data\CustomView, Glhd\Linearavel\Data\Document, Glhd\Linearavel\Data\Roadmap, Glhd\Linearavel\Data\IssueLabel, Glhd\Linearavel\Data\Contracts\Node;
class Favorite extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $type, public Optional|Favorite|null $parent, public Optional|string|null $folderName, public Optional|ProjectTab|null $projectTab, public Optional|string|null $predefinedViewType, public Optional|User $owner, public Optional|float $sortOrder, public Optional|FavoriteConnection $children, public Optional|Issue|null $issue, public Optional|Project|null $project, public Optional|Team|null $projectTeam, public Optional|Cycle|null $cycle, public Optional|CustomView|null $customView, public Optional|Team|null $predefinedViewTeam, public Optional|Document|null $document, public Optional|Roadmap|null $roadmap, public Optional|IssueLabel|null $label, public Optional|User|null $user)
    {
    }
}
