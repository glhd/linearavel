<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class GitLabSettings extends Data
{
    function __construct(public Optional|string|null $url, public Optional|bool|null $readonly, public Optional|string|null $expiresAt)
    {
    }
}
