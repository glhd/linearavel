<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Document;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'title', 'slugId', 'sortOrder', 'archivedAt', 'icon', 'color', 'content', 'contentState', 'contentData'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'document', $args));
	}
	
	public function get(string ...$fields): Document
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentQueryResponse);
		
		return $response;
	}
}
