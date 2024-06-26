<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Attachment;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'title', 'url', 'metadata', 'groupBySource', 'archivedAt', 'subtitle', 'source', 'sourceType'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'attachment', $args));
	}
	
	public function get(string ...$fields): Attachment
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentQueryResponse);
		
		return $response;
	}
}
