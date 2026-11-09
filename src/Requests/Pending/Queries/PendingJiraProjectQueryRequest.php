<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\JiraProject;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\JiraProjectQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingJiraProjectQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'externalId', 'key', 'name', 'isDefault', 'syncStatus', 'importStatus', 'archivedAt', 'syncDirection', 'syncEnabledAt', 'importedIssueCount', 'configurationError'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'jiraProject', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): JiraProject
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): JiraProjectQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(JiraProjectQueryResponse::class, $query))->throw();
		
		assert($response instanceof JiraProjectQueryResponse);
		
		return $response;
	}
}
