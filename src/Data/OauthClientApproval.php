<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\OAuthClientApprovalStatus, Illuminate\Support\Collection, Glhd\Linearavel\Data\Contracts\Node;
class OauthClientApproval extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|string $oauthClientId,
        public Optional|string $requesterId,
        public Optional|string|null $responderId,
        public Optional|OAuthClientApprovalStatus $status,
        /** @var Collection<int, string> */
        public Collection $scopes,
        public Optional|string|null $requestReason,
        public Optional|string|null $denyReason
    )
    {
    }
}
