<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectLink;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectLinkQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectLinkQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'url', 'label', 'sortOrder', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectLink', $args));
	}
	
	public function get(string ...$fields): ProjectLink
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectLinkQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectLinkQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectLinkQueryResponse);
		
		return $response;
	}
}
