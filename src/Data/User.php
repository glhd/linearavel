<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\IssueConnection, Glhd\Linearavel\Data\TeamConnection, Glhd\Linearavel\Data\TeamMembershipConnection, Glhd\Linearavel\Data\Contracts\Node;
class User extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $name, public Optional|string $displayName, public Optional|string $email, public Optional|string|null $avatarUrl, public Optional|string|null $disableReason, public Optional|string $inviteHash, public Optional|string|null $calendarHash, public Optional|string|null $description, public Optional|string|null $statusEmoji, public Optional|string|null $statusLabel, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $statusUntilAt, public Optional|string|null $timezone, public Optional|Organization $organization, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $lastSeen, public Optional|bool $guest, public Optional|bool $active, public Optional|string $url, public Optional|IssueConnection $assignedIssues, public Optional|IssueConnection $createdIssues, public Optional|int $createdIssueCount, public Optional|TeamConnection $teams, public Optional|TeamMembershipConnection $teamMemberships, public Optional|bool $isMe, public Optional|bool $admin)
    {
    }
}
