<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/WebhookCreateInput */
class WebhookCreateInput
{
	public function __construct(
		public string $url,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $resourceTypes,
		public ?string $label = null,
		public ?string $id = null,
		public ?bool $enabled = null,
		public ?string $secret = null,
		public ?string $teamId = null,
		public ?bool $allPublicTeams = null
	) {
	}
}
