<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AccessKeyReleasePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseSyncByAccessKeyMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseSyncByAccessKeyMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseSyncInputBase!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseSyncByAccessKey', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AccessKeyReleasePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseSyncByAccessKeyMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseSyncByAccessKeyMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseSyncByAccessKeyMutationResponse);
		
		return $response;
	}
}
