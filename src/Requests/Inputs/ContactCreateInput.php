<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ContactCreateInput
{
	function __construct(
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
