<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ImageUploadFromUrlPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ImageUploadFromUrlMutationResponse extends LinearResponse
{
	public function resolve(): ImageUploadFromUrlPayload
	{
		return ImageUploadFromUrlPayload::from($this->json('data.imageUploadFromUrl'));
	}
}
