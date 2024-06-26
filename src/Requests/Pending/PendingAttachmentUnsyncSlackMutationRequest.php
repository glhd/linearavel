<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentUnsyncSlackMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentUnsyncSlackMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentUnsyncSlack', $args));
	}
	
	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentUnsyncSlackMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentUnsyncSlackMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentUnsyncSlackMutationResponse);
		
		return $response;
	}
}
