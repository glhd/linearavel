<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationCancelDeletePayload extends Data
{
	public function __construct(public Optional|bool $success)
	{
	}
}
