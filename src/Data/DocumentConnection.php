<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Document>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DocumentConnection
 */
class DocumentConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, DocumentEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Document> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
