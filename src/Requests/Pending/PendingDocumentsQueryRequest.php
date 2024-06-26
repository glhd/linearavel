<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.title',
		'nodes.slugId',
		'nodes.sortOrder',
		'nodes.archivedAt',
		'nodes.icon',
		'nodes.color',
		'nodes.content',
		'nodes.contentState',
		'nodes.contentData',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documents', $args));
	}
	
	public function get(string ...$fields): DocumentConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentsQueryResponse);
		
		return $response;
	}
}
