<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntercomSettingsInput */
class IntercomSettingsInput
{
	public function __construct(
		public ?bool $sendNoteOnStatusChange = null,
		public ?bool $sendNoteOnComment = null,
		public ?bool $automateTicketReopeningOnCompletion = null,
		public ?bool $automateTicketReopeningOnCancellation = null,
		public ?bool $automateTicketReopeningOnComment = null
	) {
	}
}
