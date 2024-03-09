<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class LogoutResponse extends Data
{
    function __construct(public Optional|bool $success)
    {
    }
}
