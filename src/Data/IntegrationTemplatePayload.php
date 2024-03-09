<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IntegrationTemplate;
class IntegrationTemplatePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|IntegrationTemplate $integrationTemplate, public Optional|bool $success)
    {
    }
}
