<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class EmailUserAccountAuthChallengeResponse extends Data
{
    function __construct(public Optional|bool $success, public Optional|string $authType)
    {
    }
}
