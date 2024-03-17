<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

class GoogleSheetsSettingsInput
{
	public function __construct(public string $spreadsheetId, public string $spreadsheetUrl, public float $sheetId, public DateTimeInterface $updatedIssuesAt)
	{
	}
}
