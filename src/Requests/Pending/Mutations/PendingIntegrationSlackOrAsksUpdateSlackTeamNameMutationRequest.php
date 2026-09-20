<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationSlackWorkspaceNamePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackOrAsksUpdateSlackTeamNameMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackOrAsksUpdateSlackTeamNameMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['name', 'success'];

	protected const ARGUMENT_TYPES = ['integrationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackOrAsksUpdateSlackTeamName', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationSlackWorkspaceNamePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationSlackOrAsksUpdateSlackTeamNameMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackOrAsksUpdateSlackTeamNameMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationSlackOrAsksUpdateSlackTeamNameMutationResponse);
		
		return $response;
	}
}
