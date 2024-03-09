<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\DocumentContentHistoryType, Illuminate\Support\Collection, Spatie\LaravelData\Optional;
class DocumentContentHistoryPayload extends Data
{
    function __construct(
        /** @var Collection<int, DocumentContentHistoryType> */
        public Collection $history,
        public Optional|bool $success
    )
    {
    }
}
