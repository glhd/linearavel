<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectUpdatesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdatesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.body',
		'nodes.health',
		'nodes.isDiffHidden',
		'nodes.bodyData',
		'nodes.url',
		'nodes.archivedAt',
		'nodes.editedAt',
		'nodes.infoSnapshot',
		'nodes.diff',
		'nodes.diffMarkdown',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectUpdates', $args));
	}
	
	public function get(string ...$fields): ProjectUpdateConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdatesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdatesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdatesQueryResponse);
		
		return $response;
	}
}
