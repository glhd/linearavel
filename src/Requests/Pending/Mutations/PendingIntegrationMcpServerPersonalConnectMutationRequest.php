<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationMcpServerPersonalConnectMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationMcpServerPersonalConnectMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['customHeaders' => '[McpServerCustomHeaderInput!]', 'mcpServerDefinitionId' => 'String', 'serverUrl' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationMcpServerPersonalConnect', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationMcpServerPersonalConnectMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationMcpServerPersonalConnectMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationMcpServerPersonalConnectMutationResponse);
		
		return $response;
	}
}
