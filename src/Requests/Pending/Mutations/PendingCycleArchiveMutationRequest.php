<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CycleArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CycleArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'cycleArchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CycleArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CycleArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleArchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof CycleArchiveMutationResponse);
		
		return $response;
	}
}
