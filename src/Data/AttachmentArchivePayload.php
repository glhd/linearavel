<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ArchivePayload;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AttachmentArchivePayload extends Data implements ArchivePayload
{
	function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Attachment|null $entity = null)
	{
	}
}
