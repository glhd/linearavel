<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerCreateInput */
class CustomerCreateInput
{
	public function __construct(
		public string $name,
		public ?string $id = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $domains = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $externalIds = null,
		public ?string $slackChannelId = null,
		public ?string $ownerId = null,
		public ?string $statusId = null,
		public ?int $revenue = null,
		public ?int $size = null,
		public ?string $tierId = null,
		public ?string $logoUrl = null,
		public ?string $mainSourceId = null
	) {
	}
}
