<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseStagePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseStageCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseStageCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseStageCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseStageCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseStagePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseStageCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseStageCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseStageCreateMutationResponse);
		
		return $response;
	}
}
