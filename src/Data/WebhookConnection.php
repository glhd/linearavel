<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WebhookConnection extends Data
{
	function __construct(
		/** @var Collection<int, WebhookEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Webhook> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
