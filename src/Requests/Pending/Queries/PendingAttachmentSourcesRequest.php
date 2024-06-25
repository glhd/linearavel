<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentSourcesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentSourcesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentSourcesRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['sources'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'attachmentSources', $args));
	}
	
	public function get(string ...$fields): AttachmentSourcesPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentSourcesResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentSourcesResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentSourcesResponse);
		
		return $response;
	}
}
