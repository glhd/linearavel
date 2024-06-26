<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentSearchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SearchDocumentsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSearchDocumentsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.title',
		'nodes.slugId',
		'nodes.sortOrder',
		'nodes.metadata',
		'nodes.archivedAt',
		'nodes.icon',
		'nodes.color',
		'nodes.content',
		'nodes.contentState',
		'nodes.contentData',
		'totalCount',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'searchDocuments', $args));
	}
	
	public function get(string ...$fields): DocumentSearchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): SearchDocumentsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SearchDocumentsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof SearchDocumentsQueryResponse);
		
		return $response;
	}
}
