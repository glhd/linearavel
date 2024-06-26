<?php

namespace Glhd\Linearavel\Requests\Inputs;

class DocumentContentFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?ProjectFilterInput $project = null,
		public ?DocumentFilterInput $document = null
	) {
	}
}
