<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CommentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CommentUnresolveResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentUnresolveRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'commentUnresolve', $args));
	}
	
	public function get(string ...$fields): CommentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CommentUnresolveResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(CommentUnresolveResponse::class, (string) $query))->throw();
		
		assert($response instanceof CommentUnresolveResponse);
		
		return $response;
	}
}
