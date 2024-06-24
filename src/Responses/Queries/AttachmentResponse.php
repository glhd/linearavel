<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Attachment;
use Glhd\Linearavel\Responses\LinearResponse;

class AttachmentResponse extends LinearResponse
{
	public function resolve(): Attachment
	{
		return Attachment::from($this->json('data.attachment'));
	}
}
