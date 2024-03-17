<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class GoogleSheetsSettingsInput
{
	public function __construct(public string $spreadsheetId, public string $spreadsheetUrl, public float $sheetId, public CarbonImmutable $updatedIssuesAt)
	{
	}
}
