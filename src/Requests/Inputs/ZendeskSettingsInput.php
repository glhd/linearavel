<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

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
		public ?bool $disableCustomerRequestsAutoCreation = null,
		public ?bool $automateTicketReopeningOnProjectCompletion = null,
		public ?bool $automateTicketReopeningOnProjectCancellation = null,
		public ?bool $enableAiIntake = null,
		public ?string $customApiUrl = null,
		public ?bool $bearerTokenAuth = null,
		public ?string $botUserId = null,
		public ?bool $canReadCustomers = null,
		public ?bool $supportsOAuthRefresh = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $hostMappings = null,
		public ?bool $enableAiIntakeAttachmentProcessing = null
	) {
	}
}
