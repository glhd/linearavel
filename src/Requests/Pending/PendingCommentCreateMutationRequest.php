<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CommentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CommentCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'commentCreate', $args));
	}
	
	public function get(string ...$fields): CommentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CommentCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CommentCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CommentCreateMutationResponse);
		
		return $response;
	}
}
