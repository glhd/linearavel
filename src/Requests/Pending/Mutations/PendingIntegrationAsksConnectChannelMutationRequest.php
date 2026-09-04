<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AsksChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationAsksConnectChannelMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationAsksConnectChannelMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'addBot'];

	protected const ARGUMENT_TYPES = ['redirectUri' => 'String!', 'code' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationAsksConnectChannel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AsksChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationAsksConnectChannelMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationAsksConnectChannelMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationAsksConnectChannelMutationResponse);
		
		return $response;
	}
}
