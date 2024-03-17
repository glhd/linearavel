<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GoogleSheetsSettings extends Data
{
	public function __construct(
		public Optional|string $spreadsheetId,
		public Optional|string $spreadsheetUrl,
		public Optional|float $sheetId,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedIssuesAt
	) {
	}
}
