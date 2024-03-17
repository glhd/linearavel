<?php

namespace Glhd\Linearavel\Requests\Inputs;

class AuditEntryFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $type = null,
		public ?StringComparator $ip = null,
		public ?StringComparator $countryCode = null,
		public ?NullableUserFilter $actor = null
	) {
	}
}
