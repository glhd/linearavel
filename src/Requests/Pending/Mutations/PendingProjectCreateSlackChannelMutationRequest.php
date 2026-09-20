<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectCreateSlackChannelMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectCreateSlackChannelMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['integrationId' => 'String', 'slackChannelName' => 'String!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectCreateSlackChannel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectCreateSlackChannelMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectCreateSlackChannelMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectCreateSlackChannelMutationResponse);
		
		return $response;
	}
}
