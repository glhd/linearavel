<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\OAuthApplicationGrantType;
use Glhd\Linearavel\Data\Enums\WebhookResourceType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OAuthApplicationCreateInput */
class OAuthApplicationCreateInput
{
	public function __construct(
		public string $name,
		public string $developer,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $redirectUris,
		public ?string $description = null,
		public ?string $developerUrl = null,
		/** @var iterable<OAuthApplicationGrantType>|Collection<int, OAuthApplicationGrantType> */
		public ?iterable $grantTypes = null,
		public ?string $idempotencyKey = null,
		public ?string $imageUrl = null,
		public ?string $webhookUrl = null,
		/** @var iterable<WebhookResourceType>|Collection<int, WebhookResourceType> */
		public ?iterable $webhookResourceTypes = null
	) {
	}
}
