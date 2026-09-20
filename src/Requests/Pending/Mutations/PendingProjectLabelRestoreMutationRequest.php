<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectLabelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectLabelRestoreMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectLabelRestoreMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectLabelRestore', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectLabelPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectLabelRestoreMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectLabelRestoreMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectLabelRestoreMutationResponse);
		
		return $response;
	}
}
