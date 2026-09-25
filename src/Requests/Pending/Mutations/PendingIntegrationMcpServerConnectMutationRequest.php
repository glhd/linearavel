<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationMcpServerConnectMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationMcpServerConnectMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['settings' => 'McpServerIntegrationSettingsInput', 'customHeaders' => '[McpServerCustomHeaderInput!]', 'mcpServerDefinitionId' => 'String', 'workflowDefinitionDraftId' => 'String', 'workflowDefinitionId' => 'String', 'teamId' => 'String', 'serverUrl' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationMcpServerConnect', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationMcpServerConnectMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationMcpServerConnectMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationMcpServerConnectMutationResponse);
		
		return $response;
	}
}
