<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IntercomSettingsInput
{
	function __construct(
		public ?bool $sendNoteOnStatusChange = null,
		public ?bool $sendNoteOnComment = null,
		public ?bool $automateTicketReopeningOnCompletion = null,
		public ?bool $automateTicketReopeningOnCancellation = null,
		public ?bool $automateTicketReopeningOnComment = null
	) {
	}
}
