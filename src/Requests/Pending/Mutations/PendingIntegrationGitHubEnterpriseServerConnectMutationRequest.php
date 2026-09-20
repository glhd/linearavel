<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitHubEnterpriseServerPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationGitHubEnterpriseServerConnectMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationGitHubEnterpriseServerConnectMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'setupUrl', 'installUrl', 'webhookSecret'];

	protected const ARGUMENT_TYPES = ['organizationName' => 'String!', 'githubUrl' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationGitHubEnterpriseServerConnect', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GitHubEnterpriseServerPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationGitHubEnterpriseServerConnectMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationGitHubEnterpriseServerConnectMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationGitHubEnterpriseServerConnectMutationResponse);
		
		return $response;
	}
}
