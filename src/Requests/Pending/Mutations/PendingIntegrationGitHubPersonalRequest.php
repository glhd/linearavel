<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationGitHubPersonalResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationGitHubPersonalRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationGitHubPersonal', $args));
	}
	
	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationGitHubPersonalResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationGitHubPersonalResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationGitHubPersonalResponse);
		
		return $response;
	}
}
