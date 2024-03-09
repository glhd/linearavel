<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\TriageResponsibilityAction, Glhd\Linearavel\Data\TriageResponsibilityManualSelection, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\TimeSchedule, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\Contracts\Node;
class TriageResponsibility extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|TriageResponsibilityAction $action, public Optional|TriageResponsibilityManualSelection|null $manualSelection, public Optional|Team $team, public Optional|TimeSchedule|null $timeSchedule, public Optional|User|null $currentUser)
    {
    }
}
