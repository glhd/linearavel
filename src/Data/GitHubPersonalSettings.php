<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class GitHubPersonalSettings extends Data
{
    function __construct(public Optional|string $login)
    {
    }
}
