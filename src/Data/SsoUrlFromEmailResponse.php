<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class SsoUrlFromEmailResponse extends Data
{
    function __construct(public Optional|bool $success, public Optional|string $samlSsoUrl)
    {
    }
}
