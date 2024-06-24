<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AttachmentLinkGitLabMRResponse extends LinearResponse
{
	public function resolve(): AttachmentPayload
	{
		return AttachmentPayload::from($this->json('data.attachmentLinkGitLabMR'));
	}
}