<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class ZendeskSettings extends Data
{
    function __construct(public Optional|bool|null $sendNoteOnStatusChange, public Optional|bool|null $sendNoteOnComment, public Optional|bool|null $automateTicketReopeningOnCompletion, public Optional|bool|null $automateTicketReopeningOnCancellation, public Optional|bool|null $automateTicketReopeningOnComment, public Optional|string $subdomain, public Optional|string $url, public Optional|string|null $botUserId)
    {
    }
}
