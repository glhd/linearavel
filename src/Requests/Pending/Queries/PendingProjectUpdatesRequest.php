<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectUpdatesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdatesRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): ProjectUpdatesResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdatesResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdatesResponse);
		
		return $response;
	}
}
