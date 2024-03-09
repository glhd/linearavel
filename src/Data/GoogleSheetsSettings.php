<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface;
class GoogleSheetsSettings extends Data
{
    function __construct(public Optional|string $spreadsheetId, public Optional|string $spreadsheetUrl, public Optional|float $sheetId, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedIssuesAt)
    {
    }
}
