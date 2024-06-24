<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuditEntryConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AuditEntriesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAuditEntriesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'auditEntries', $args));
	}
	
	public function get(string ...$fields): AuditEntryConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AuditEntriesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(AuditEntriesResponse::class, (string) $query))->throw();
		
		assert($response instanceof AuditEntriesResponse);
		
		return $response;
	}
}