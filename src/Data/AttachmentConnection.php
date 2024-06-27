<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Attachment>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AttachmentConnection
 */
class AttachmentConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, AttachmentEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Attachment> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
