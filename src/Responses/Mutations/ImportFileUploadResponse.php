<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\UploadPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ImportFileUploadResponse extends LinearResponse
{
	public function resolve(): UploadPayload
	{
		return UploadPayload::from($this->json('data.importFileUpload'));
	}
}
