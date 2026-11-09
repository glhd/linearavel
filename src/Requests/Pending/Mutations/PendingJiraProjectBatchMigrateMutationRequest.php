<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\JiraProjectBatchMigratePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\JiraProjectBatchMigrateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingJiraProjectBatchMigrateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'JiraProjectBatchMigrateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'jiraProjectBatchMigrate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): JiraProjectBatchMigratePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): JiraProjectBatchMigrateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(JiraProjectBatchMigrateMutationResponse::class, $query))->throw();
		
		assert($response instanceof JiraProjectBatchMigrateMutationResponse);
		
		return $response;
	}
}
