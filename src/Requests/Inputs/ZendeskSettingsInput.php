<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ZendeskSettingsInput */
class ZendeskSettingsInput
{
	public function __construct(
		public string $subdomain,
		public string $url,
		public ?bool $sendNoteOnStatusChange = null,
		public ?bool $sendNoteOnComment = null,
		public ?bool $automateTicketReopeningOnCompletion = null,
		public ?bool $automateTicketReopeningOnCancellation = null,
		public ?bool $automateTicketReopeningOnComment = null,
		public ?string $botUserId = null
	) {
	}
}
