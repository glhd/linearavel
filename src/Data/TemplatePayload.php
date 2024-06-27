<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TemplatePayload */
class TemplatePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Template $template, public Optional|bool $success)
	{
	}
}
