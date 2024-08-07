<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ContactCreateInput */
class ContactCreateInput
{
	public function __construct(
		public string $type,
		public string $message,
		public ?string $operatingSystem = null,
		public ?string $browser = null,
		public ?string $device = null,
		public ?string $clientVersion = null,
		public ?int $disappointmentRating = null
	) {
	}
}
