<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CycleArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CycleArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'cycleArchive', $args));
	}
	
	public function get(string ...$fields): CycleArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CycleArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleArchiveMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CycleArchiveMutationResponse);
		
		return $response;
	}
}
