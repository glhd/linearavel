<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackInitiativePostMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackInitiativePostMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'addBot', 'nudgeToConnectMainSlackIntegration', 'nudgeToUpdateMainSlackIntegration'];

	protected const ARGUMENT_TYPES = ['redirectUri' => 'String!', 'initiativeId' => 'String!', 'code' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackInitiativePost', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): SlackChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationSlackInitiativePostMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackInitiativePostMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationSlackInitiativePostMutationResponse);
		
		return $response;
	}
}
