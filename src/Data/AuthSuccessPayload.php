<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class AuthSuccessPayload extends Data
{
    function __construct(public Optional|bool $success)
    {
    }
}
