<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentContentHistoryPayload extends Data
{
	function __construct(
		/** @var Collection<int, DocumentContentHistoryType> */
		public Optional|Collection $history,
		public Optional|bool $success
	) {
	}
}
