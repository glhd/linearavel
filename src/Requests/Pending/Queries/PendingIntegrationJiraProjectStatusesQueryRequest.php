<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\JiraProjectStatusesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationJiraProjectStatusesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationJiraProjectStatusesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['issueStatuses', 'projectStatuses'];

	protected const ARGUMENT_TYPES = ['projectId' => 'String!', 'integrationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationJiraProjectStatuses', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): JiraProjectStatusesPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationJiraProjectStatusesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationJiraProjectStatusesQueryResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationJiraProjectStatusesQueryResponse);
		
		return $response;
	}
}
