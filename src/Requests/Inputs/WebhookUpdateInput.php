<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/WebhookUpdateInput */
class WebhookUpdateInput
{
	public function __construct(
		public ?string $label = null,
		public ?string $secret = null,
		public ?bool $enabled = null,
		public ?string $url = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $resourceTypes = null
	) {
	}
}
