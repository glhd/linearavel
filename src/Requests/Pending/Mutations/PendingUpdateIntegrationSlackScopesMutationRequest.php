<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UpdateIntegrationSlackScopesMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUpdateIntegrationSlackScopesMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['requestedScopes' => '[String!]', 'integrationId' => 'String!', 'redirectUri' => 'String!', 'code' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'updateIntegrationSlackScopes', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UpdateIntegrationSlackScopesMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UpdateIntegrationSlackScopesMutationResponse::class, $query))->throw();
		
		assert($response instanceof UpdateIntegrationSlackScopesMutationResponse);
		
		return $response;
	}
}
