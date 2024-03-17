<?php

namespace Glhd\Linearavel\Requests\Inputs;

class DocumentContentFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?ProjectFilter $project = null,
		public ?DocumentFilter $document = null
	) {
	}
}
