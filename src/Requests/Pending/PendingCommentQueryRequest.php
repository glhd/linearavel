<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Comment;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CommentQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'body', 'bodyData', 'reactionData', 'url', 'archivedAt', 'resolvedAt', 'editedAt', 'quotedText', 'summaryText'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'comment', $args));
	}
	
	public function get(string ...$fields): Comment
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CommentQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CommentQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof CommentQueryResponse);
		
		return $response;
	}
}
