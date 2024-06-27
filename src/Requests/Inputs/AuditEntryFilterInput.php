<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AuditEntryFilter */
class AuditEntryFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $type = null,
		public ?StringComparatorInput $ip = null,
		public ?StringComparatorInput $countryCode = null,
		public ?NullableUserFilterInput $actor = null
	) {
	}
}
