<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntercomSettings extends Data
{
	function __construct(
		public Optional|bool|null $sendNoteOnStatusChange,
		public Optional|bool|null $sendNoteOnComment,
		public Optional|bool|null $automateTicketReopeningOnCompletion,
		public Optional|bool|null $automateTicketReopeningOnCancellation,
		public Optional|bool|null $automateTicketReopeningOnComment
	) {
	}
}
