<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CreateCsvExportReportPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CreateCsvExportReportMutationResponse extends LinearResponse
{
	public function resolve(): CreateCsvExportReportPayload
	{
		return CreateCsvExportReportPayload::from($this->json('data.createCsvExportReport'));
	}
}
