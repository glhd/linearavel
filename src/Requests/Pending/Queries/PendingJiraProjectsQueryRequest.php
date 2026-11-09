<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\JiraProjectConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\JiraProjectsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingJiraProjectsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.externalId', 'nodes.key', 'nodes.name', 'nodes.isDefault', 'nodes.syncStatus', 'nodes.importStatus', 'nodes.archivedAt', 'nodes.syncDirection', 'nodes.syncEnabledAt', 'nodes.importedIssueCount', 'nodes.configurationError'];

	protected const ARGUMENT_TYPES = ['filter' => 'JiraProjectFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'jiraProjects', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): JiraProjectConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): JiraProjectsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(JiraProjectsQueryResponse::class, $query))->throw();
		
		assert($response instanceof JiraProjectsQueryResponse);
		
		return $response;
	}
}
