<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\AuthApiKey;
class AuthApiKeyPayload extends Data
{
    function __construct(public Optional|bool $success, public Optional|AuthApiKey $authApiKey)
    {
    }
}
