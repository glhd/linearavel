<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleasePipelineArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleasePipelineUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleasePipelineUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releasePipelineUnarchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleasePipelineArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleasePipelineUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleasePipelineUnarchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleasePipelineUnarchiveMutationResponse);
		
		return $response;
	}
}
