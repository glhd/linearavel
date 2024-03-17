<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UploadFile extends Data
{
	function __construct(
		public Optional|string $filename,
		public Optional|string $contentType,
		public Optional|int $size,
		public Optional|string $uploadUrl,
		public Optional|string $assetUrl,
		public Optional|string|null $metaData = null,
		/** @var Collection<int, UploadFileHeader> */
		public Optional|Collection $headers
	) {
	}
}
