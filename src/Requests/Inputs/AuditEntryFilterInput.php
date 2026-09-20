<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

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
		public ?StringComparatorInput $entityId = null,
		public ?StringComparatorInput $entityType = null,
		public ?StringComparatorInput $entityIdentifier = null,
		public ?NullableUserFilterInput $actor = null,
		/** @var iterable<AuditEntryFilterInput>|Collection<int, AuditEntryFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<AuditEntryFilterInput>|Collection<int, AuditEntryFilterInput> */
		public ?iterable $or = null
	) {
	}
}
