<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AttachmentSourcesPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AttachmentSourcesResponse extends LinearResponse
{
	public function resolve(): AttachmentSourcesPayload
	{
		return AttachmentSourcesPayload::from($this->json('data.attachmentSources'));
	}
}
