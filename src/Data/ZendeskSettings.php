<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ZendeskSettings extends Data
{
	public function __construct(
		public Optional|string $subdomain,
		public Optional|string $url,
		public Optional|bool|null $sendNoteOnStatusChange = null,
		public Optional|bool|null $sendNoteOnComment = null,
		public Optional|bool|null $automateTicketReopeningOnCompletion = null,
		public Optional|bool|null $automateTicketReopeningOnCancellation = null,
		public Optional|bool|null $automateTicketReopeningOnComment = null,
		public Optional|string|null $botUserId = null
	) {
	}
}
