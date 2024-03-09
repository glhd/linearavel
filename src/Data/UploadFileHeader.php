<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class UploadFileHeader extends Data
{
    function __construct(public Optional|string $key, public Optional|string $value)
    {
    }
}
