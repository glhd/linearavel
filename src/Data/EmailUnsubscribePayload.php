<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class EmailUnsubscribePayload extends Data
{
    function __construct(public Optional|bool $success)
    {
    }
}
