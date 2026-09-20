<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\OAuthApplicationGrantType;
use Glhd\Linearavel\Data\Enums\WebhookResourceType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OAuthApplicationUpdateInput */
class OAuthApplicationUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?string $developer = null,
		public ?string $developerUrl = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $redirectUris = null,
		/** @var iterable<OAuthApplicationGrantType>|Collection<int, OAuthApplicationGrantType> */
		public ?iterable $grantTypes = null,
		public ?string $imageUrl = null,
		public ?string $webhookUrl = null,
		public ?bool $webhookEnabled = null,
		/** @var iterable<WebhookResourceType>|Collection<int, WebhookResourceType> */
		public ?iterable $webhookResourceTypes = null
	) {
	}
}
