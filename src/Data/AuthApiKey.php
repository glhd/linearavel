<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class AuthApiKey extends Data
{
    function __construct(public Optional|string $id)
    {
    }
}
