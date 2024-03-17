<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ZendeskSettings extends Data
{
	public function __construct(
		public Optional|string $subdomain,
		public Optional|string $url,
		public Optional|bool|null $sendNoteOnStatusChange,
		public Optional|bool|null $sendNoteOnComment,
		public Optional|bool|null $automateTicketReopeningOnCompletion,
		public Optional|bool|null $automateTicketReopeningOnCancellation,
		public Optional|bool|null $automateTicketReopeningOnComment,
		public Optional|string|null $botUserId
	) {
	}
}
