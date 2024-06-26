<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReactionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReactionCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReactionCreateMutationRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): ReactionCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReactionCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ReactionCreateMutationResponse);
		
		return $response;
	}
}
