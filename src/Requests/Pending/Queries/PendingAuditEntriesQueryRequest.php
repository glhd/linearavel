<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuditEntryConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AuditEntriesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAuditEntriesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.type', 'nodes.archivedAt', 'nodes.actorId', 'nodes.ip', 'nodes.countryCode', 'nodes.metadata', 'nodes.requestInformation'];

	protected const ARGUMENT_TYPES = ['filter' => 'AuditEntryFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'auditEntries', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AuditEntryConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AuditEntriesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AuditEntriesQueryResponse::class, $query))->throw();
		
		assert($response instanceof AuditEntriesQueryResponse);
		
		return $response;
	}
}
