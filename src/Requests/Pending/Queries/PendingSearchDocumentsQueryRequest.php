<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentSearchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SearchDocumentsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSearchDocumentsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.title', 'nodes.slugId', 'nodes.sortOrder', 'nodes.metadata', 'nodes.archivedAt', 'nodes.icon', 'nodes.color', 'nodes.content', 'nodes.contentState', 'nodes.contentData', 'totalCount'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'term' => 'String!', 'snippetSize' => 'Float', 'includeComments' => 'Boolean', 'teamId' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'searchDocuments', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentSearchPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): SearchDocumentsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SearchDocumentsQueryResponse::class, $query))->throw();
		
		assert($response instanceof SearchDocumentsQueryResponse);
		
		return $response;
	}
}
