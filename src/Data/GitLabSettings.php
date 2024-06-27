<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitLabSettings */
class GitLabSettings extends Data
{
	public function __construct(public Optional|string|null $url, public Optional|bool|null $readonly, public Optional|string|null $expiresAt)
	{
	}
}
