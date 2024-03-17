<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class WebhookUpdateInput
{
	public function __construct(
		/** @var Collection<int, string> */
		public Collection $resourceTypes,
		public ?string $label = null,
		public ?string $secret = null,
		public ?bool $enabled = null,
		public ?string $url = null
	) {
	}
}
