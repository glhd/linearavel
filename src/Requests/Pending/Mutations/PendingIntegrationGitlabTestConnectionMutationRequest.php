<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitLabTestConnectionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationGitlabTestConnectionMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationGitlabTestConnectionMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'error', 'errorResponseBody', 'errorResponseHeaders', 'errorRequest'];

	protected const ARGUMENT_TYPES = ['integrationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationGitlabTestConnection', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GitLabTestConnectionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationGitlabTestConnectionMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationGitlabTestConnectionMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationGitlabTestConnectionMutationResponse);
		
		return $response;
	}
}
