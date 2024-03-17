<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentContentHistoryPayload extends Data
{
	public function __construct(
		public Optional|bool $success,
		/** @var Collection<int, DocumentContentHistoryType> */
		public Optional|Collection|null $history
	) {
	}
}
