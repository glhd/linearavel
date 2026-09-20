<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleasePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseUpdateByPipelineMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseUpdateByPipelineMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseUpdateByPipelineInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseUpdateByPipeline', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleasePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseUpdateByPipelineMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseUpdateByPipelineMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseUpdateByPipelineMutationResponse);
		
		return $response;
	}
}
