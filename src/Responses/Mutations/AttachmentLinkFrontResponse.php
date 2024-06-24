<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\FrontAttachmentPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AttachmentLinkFrontResponse extends LinearResponse
{
	public function resolve(): FrontAttachmentPayload
	{
		return FrontAttachmentPayload::from($this->json('data.attachmentLinkFront'));
	}
}
