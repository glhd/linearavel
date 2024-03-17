<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GoogleSheetsSettings extends Data
{
	public function __construct(
		public Optional|string $spreadsheetId,
		public Optional|string $spreadsheetUrl,
		public Optional|float $sheetId,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedIssuesAt
	) {
	}
}
