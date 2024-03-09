<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class SentrySettings extends Data
{
    function __construct(public Optional|string $organizationSlug)
    {
    }
}
