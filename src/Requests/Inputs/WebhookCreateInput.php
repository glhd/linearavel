<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class WebhookCreateInput
{
	public function __construct(
		public string $url,
		/** @var Collection<int, string> */
		public Collection $resourceTypes,
		public ?string $label = null,
		public ?string $id = null,
		public ?bool $enabled = null,
		public ?string $secret = null,
		public ?string $teamId = null,
		public ?bool $allPublicTeams = null
	) {
	}
}
