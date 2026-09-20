<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationMicrosoftTeamsProjectPostMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationMicrosoftTeamsProjectPostMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['membershipType' => 'String!', 'channelName' => 'String!', 'channelId' => 'String!', 'teamName' => 'String!', 'teamId' => 'String!', 'projectId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationMicrosoftTeamsProjectPost', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationMicrosoftTeamsProjectPostMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationMicrosoftTeamsProjectPostMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationMicrosoftTeamsProjectPostMutationResponse);
		
		return $response;
	}
}
