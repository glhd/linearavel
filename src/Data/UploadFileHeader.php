<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UploadFileHeader extends Data
{
	function __construct(public Optional|string $key, public Optional|string $value)
	{
	}
}
