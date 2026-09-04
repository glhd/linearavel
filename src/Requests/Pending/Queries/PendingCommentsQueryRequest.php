<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CommentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CommentsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.body', 'nodes.bodyData', 'nodes.reactionData', 'nodes.url', 'nodes.archivedAt', 'nodes.resolvedAt', 'nodes.editedAt', 'nodes.quotedText', 'nodes.summaryText'];

	protected const ARGUMENT_TYPES = ['filter' => 'CommentFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'comments', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CommentConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CommentsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CommentsQueryResponse::class, $query))->throw();
		
		assert($response instanceof CommentsQueryResponse);
		
		return $response;
	}
}
