<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AttachmentArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AttachmentArchiveMutationResponse extends LinearResponse
{
	public function resolve(): AttachmentArchivePayload
	{
		return AttachmentArchivePayload::from($this->json('data.attachmentArchive'));
	}
}
