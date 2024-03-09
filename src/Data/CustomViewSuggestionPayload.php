<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class CustomViewSuggestionPayload extends Data
{
    function __construct(public Optional|string|null $name, public Optional|string|null $description, public Optional|string|null $icon)
    {
    }
}
