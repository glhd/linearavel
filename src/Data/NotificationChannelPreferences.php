<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationChannelPreferences */
class NotificationChannelPreferences extends Data
{
	public function __construct(public Optional|bool $mobile, public Optional|bool $desktop, public Optional|bool $email, public Optional|bool $slack)
	{
	}
}
