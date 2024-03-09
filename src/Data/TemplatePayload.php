<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Template;
class TemplatePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Template $template, public Optional|bool $success)
    {
    }
}
