<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Attachment;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'title', 'url', 'metadata', 'groupBySource', 'archivedAt', 'subtitle', 'source', 'sourceType'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'attachment', $args));
	}
	
	public function get(string ...$fields): Attachment
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentResponse);
		
		return $response;
	}
}
