<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerUpsertInput */
class CustomerUpsertInput
{
	public function __construct(
		public ?string $id = null,
		public ?string $name = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $domains = null,
		public ?string $externalId = null,
		public ?string $slackChannelId = null,
		public ?string $ownerId = null,
		public ?string $statusId = null,
		public ?int $revenue = null,
		public ?int $size = null,
		public ?string $tierId = null,
		public ?string $logoUrl = null,
		public ?string $tierName = null
	) {
	}
}
