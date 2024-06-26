<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdate;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectUpdateQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'body', 'health', 'isDiffHidden', 'bodyData', 'url', 'archivedAt', 'editedAt', 'infoSnapshot', 'diff', 'diffMarkdown'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectUpdate', $args));
	}
	
	public function get(string ...$fields): ProjectUpdate
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateQueryResponse);
		
		return $response;
	}
}
