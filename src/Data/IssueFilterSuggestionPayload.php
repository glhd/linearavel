<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\JSONObject;
class IssueFilterSuggestionPayload extends Data
{
    function __construct(public Optional|JSONObject|null $filter)
    {
    }
}
