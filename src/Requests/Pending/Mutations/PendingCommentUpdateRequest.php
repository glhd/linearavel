<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CommentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CommentUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCommentUpdateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'commentUpdate', $args));
	}
	
	public function get(string ...$fields): CommentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CommentUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CommentUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof CommentUpdateResponse);
		
		return $response;
	}
}
