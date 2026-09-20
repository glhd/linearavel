<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectExternalSyncDisableMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectExternalSyncDisableMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['syncSource' => 'ExternalSyncService!', 'projectId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectExternalSyncDisable', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectExternalSyncDisableMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectExternalSyncDisableMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectExternalSyncDisableMutationResponse);
		
		return $response;
	}
}
