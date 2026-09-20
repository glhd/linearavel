<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseStagePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseStageUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseStageUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseStageUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseStageUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseStagePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseStageUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseStageUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseStageUpdateMutationResponse);
		
		return $response;
	}
}
