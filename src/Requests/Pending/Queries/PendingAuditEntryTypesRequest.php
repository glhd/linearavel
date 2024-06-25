<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuditEntryType;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AuditEntryTypesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingAuditEntryTypesRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['type', 'description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'auditEntryTypes', $args));
	}
	
	/** @returns Collection<int, AuditEntryType> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AuditEntryTypesResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AuditEntryTypesResponse::class, (string) $query))->throw();
		
		assert($response instanceof AuditEntryTypesResponse);
		
		return $response;
	}
}
