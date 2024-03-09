<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AttachmentConnection extends Data
{
	function __construct(
		/** @var Collection<int, AttachmentEdge> */
		public Collection $edges,
		/** @var Collection<int, Attachment> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
