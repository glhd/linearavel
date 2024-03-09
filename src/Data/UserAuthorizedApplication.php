<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class UserAuthorizedApplication extends Data
{
    function __construct(public Optional|string $id, public Optional|string $clientId, public Optional|string $name, public Optional|string|null $description, public Optional|string $developer, public Optional|string $developerUrl, public Optional|string|null $imageUrl, public Optional|bool $isAuthorized, public Optional|bool $createdByLinear, public Optional|bool $webhooksEnabled, public Optional|string|null $approvalErrorCode)
    {
    }
}
