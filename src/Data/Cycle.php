<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Illuminate\Support\Collection, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\IssueConnection, Glhd\Linearavel\Data\Contracts\Node;
class Cycle extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|float $number,
        public Optional|string|null $name,
        public Optional|string|null $description,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $startsAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $endsAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $completedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoArchivedAt,
        /** @var Collection<int, float> */
        public Collection $issueCountHistory,
        /** @var Collection<int, float> */
        public Collection $completedIssueCountHistory,
        /** @var Collection<int, float> */
        public Collection $scopeHistory,
        /** @var Collection<int, float> */
        public Collection $completedScopeHistory,
        /** @var Collection<int, float> */
        public Collection $inProgressScopeHistory,
        public Optional|Team $team,
        public Optional|IssueConnection $issues,
        public Optional|IssueConnection $uncompletedIssuesUponClose,
        public Optional|float $progress
    )
    {
    }
}
