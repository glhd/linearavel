<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CommentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CommentsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.body',
		'nodes.bodyData',
		'nodes.reactionData',
		'nodes.url',
		'nodes.archivedAt',
		'nodes.resolvedAt',
		'nodes.editedAt',
		'nodes.quotedText',
		'nodes.summaryText',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'comments', $args));
	}
	
	public function get(string ...$fields): CommentConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CommentsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CommentsResponse::class, (string) $query))->throw();
		
		assert($response instanceof CommentsResponse);
		
		return $response;
	}
}
