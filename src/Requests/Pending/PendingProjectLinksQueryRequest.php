<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectLinkConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectLinksQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectLinksQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.url', 'nodes.label', 'nodes.sortOrder', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectLinks', $args));
	}
	
	public function get(string ...$fields): ProjectLinkConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectLinksQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectLinksQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectLinksQueryResponse);
		
		return $response;
	}
}
