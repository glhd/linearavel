<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleasePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseSyncMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseSyncMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseSyncInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseSync', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleasePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseSyncMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseSyncMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseSyncMutationResponse);
		
		return $response;
	}
}
