<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectStatusArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectStatusUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectStatusUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectStatusUnarchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectStatusArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectStatusUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectStatusUnarchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectStatusUnarchiveMutationResponse);
		
		return $response;
	}
}
