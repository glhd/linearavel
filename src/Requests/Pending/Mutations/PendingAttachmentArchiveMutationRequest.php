<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentArchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AttachmentArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AttachmentArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentArchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof AttachmentArchiveMutationResponse);
		
		return $response;
	}
}
