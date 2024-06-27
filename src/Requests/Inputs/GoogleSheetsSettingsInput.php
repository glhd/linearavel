<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GoogleSheetsSettingsInput */
class GoogleSheetsSettingsInput
{
	public function __construct(public string $spreadsheetId, public string $spreadsheetUrl, public float $sheetId, public DateTimeInterface $updatedIssuesAt)
	{
	}
}
