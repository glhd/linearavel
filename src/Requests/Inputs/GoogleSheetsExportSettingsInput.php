<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GoogleSheetsExportSettings */
class GoogleSheetsExportSettingsInput
{
	public function __construct(public ?bool $enabled = null, public ?string $spreadsheetId = null, public ?string $spreadsheetUrl = null, public ?float $sheetId = null, public ?DateTimeInterface $updatedAt = null)
	{
	}
}
