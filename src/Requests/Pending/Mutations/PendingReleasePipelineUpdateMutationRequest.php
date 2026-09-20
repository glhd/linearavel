<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleasePipelinePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleasePipelineUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleasePipelineUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleasePipelineUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releasePipelineUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleasePipelinePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleasePipelineUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleasePipelineUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleasePipelineUpdateMutationResponse);
		
		return $response;
	}
}
