<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IntegrationsSettings;
class IntegrationsSettingsPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|IntegrationsSettings $integrationsSettings, public Optional|bool $success)
    {
    }
}
