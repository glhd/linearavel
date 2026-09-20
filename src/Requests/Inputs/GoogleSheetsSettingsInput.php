<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GoogleSheetsSettingsInput */
class GoogleSheetsSettingsInput
{
	public function __construct(public ?string $spreadsheetId = null, public ?string $spreadsheetUrl = null, public ?float $sheetId = null, public ?DateTimeInterface $updatedIssuesAt = null, public ?GoogleSheetsExportSettingsInput $issue = null, public ?GoogleSheetsExportSettingsInput $project = null, public ?GoogleSheetsExportSettingsInput $initiative = null)
	{
	}
}
