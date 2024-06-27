<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Contracts\SkipsCodeGeneration;
use Glhd\Linearavel\Responses\LinearResponse;
use RuntimeException;
use Spatie\LaravelData\Data;

class NotificationSubscriptionQueryResponse extends LinearResponse implements SkipsCodeGeneration
{
	public function resolve(): Data
	{
		// return NotificationSubscription::from($this->json('data.notificationSubscription'));
		throw new RuntimeException('Not yet implemented.');
	}
}
