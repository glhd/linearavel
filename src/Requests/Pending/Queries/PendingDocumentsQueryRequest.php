<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.title', 'nodes.slugId', 'nodes.sortOrder', 'nodes.archivedAt', 'nodes.icon', 'nodes.color', 'nodes.content', 'nodes.contentState', 'nodes.contentData'];

	protected const ARGUMENT_TYPES = ['filter' => 'DocumentFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documents', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentsQueryResponse::class, $query))->throw();
		
		assert($response instanceof DocumentsQueryResponse);
		
		return $response;
	}
}
