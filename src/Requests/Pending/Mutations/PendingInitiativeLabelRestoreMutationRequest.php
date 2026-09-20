<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeLabelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeLabelRestoreMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeLabelRestoreMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeLabelRestore', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeLabelPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeLabelRestoreMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeLabelRestoreMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeLabelRestoreMutationResponse);
		
		return $response;
	}
}
