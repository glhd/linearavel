<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReactionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReactionCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReactionCreateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'reactionCreate', $args));
	}
	
	public function get(string ...$fields): ReactionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ReactionCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReactionCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof ReactionCreateResponse);
		
		return $response;
	}
}
