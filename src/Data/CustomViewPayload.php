<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\CustomView;
class CustomViewPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|CustomView $customView, public Optional|bool $success)
    {
    }
}
