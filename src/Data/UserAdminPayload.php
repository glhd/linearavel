<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserAdminPayload extends Data
{
	public function __construct(public Optional|bool $success)
	{
	}
}
