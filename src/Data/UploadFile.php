<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\UploadFileHeader, Illuminate\Support\Collection;
class UploadFile extends Data
{
    function __construct(
        public Optional|string $filename,
        public Optional|string $contentType,
        public Optional|int $size,
        public Optional|string $uploadUrl,
        public Optional|string $assetUrl,
        public Optional|JSONObject|null $metaData,
        /** @var Collection<int, UploadFileHeader> */
        public Collection $headers
    )
    {
    }
}
