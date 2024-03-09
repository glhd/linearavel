<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class JiraPersonalSettings extends Data
{
    function __construct(public Optional|string|null $siteName)
    {
    }
}
