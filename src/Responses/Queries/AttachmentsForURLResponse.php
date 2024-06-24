<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AttachmentConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class AttachmentsForURLResponse extends LinearResponse
{
	public function resolve(): AttachmentConnection
	{
		return AttachmentConnection::from($this->json('data.attachmentsForURL'));
	}
}
