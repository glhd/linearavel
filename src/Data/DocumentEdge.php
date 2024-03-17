<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentEdge extends Data
{
	public function __construct(public Optional|Document $node, public Optional|string $cursor)
	{
	}
}
