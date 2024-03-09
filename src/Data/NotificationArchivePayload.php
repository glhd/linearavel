<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ArchivePayload;
use Glhd\Linearavel\Data\Contracts\Notification;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationArchivePayload extends Data implements ArchivePayload
{
	function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Notification|null $entity)
	{
	}
}
