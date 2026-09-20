<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\MicrosoftTeamsChannelsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\MicrosoftTeamsChannelsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingMicrosoftTeamsChannelsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'microsoftTeamsChannels', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): MicrosoftTeamsChannelsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): MicrosoftTeamsChannelsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(MicrosoftTeamsChannelsQueryResponse::class, $query))->throw();
		
		assert($response instanceof MicrosoftTeamsChannelsQueryResponse);
		
		return $response;
	}
}
