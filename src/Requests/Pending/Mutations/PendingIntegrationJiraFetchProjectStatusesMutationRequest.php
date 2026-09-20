<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\JiraFetchProjectStatusesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationJiraFetchProjectStatusesMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationJiraFetchProjectStatusesMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'issueStatuses', 'projectStatuses'];

	protected const ARGUMENT_TYPES = ['input' => 'JiraFetchProjectStatusesInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationJiraFetchProjectStatuses', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): JiraFetchProjectStatusesPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationJiraFetchProjectStatusesMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationJiraFetchProjectStatusesMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationJiraFetchProjectStatusesMutationResponse);
		
		return $response;
	}
}
