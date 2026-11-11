<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\FileUploadDeletePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class FileUploadDangerouslyDeleteMutationResponse extends LinearResponse
{
	public function resolve(): FileUploadDeletePayload
	{
		return FileUploadDeletePayload::from($this->json('data.fileUploadDangerouslyDelete'));
	}
}
