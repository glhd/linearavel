<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CommentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CommentResolveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentResolveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['resolvingCommentId' => 'String', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'commentResolve', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CommentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CommentResolveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CommentResolveMutationResponse::class, $query))->throw();
		
		assert($response instanceof CommentResolveMutationResponse);
		
		return $response;
	}
}
