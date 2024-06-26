<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitHubCommitIntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationGithubCommitCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationGithubCommitCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'webhookSecret'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationGithubCommitCreate', $args));
	}
	
	public function get(string ...$fields): GitHubCommitIntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationGithubCommitCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationGithubCommitCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationGithubCommitCreateMutationResponse);
		
		return $response;
	}
}
