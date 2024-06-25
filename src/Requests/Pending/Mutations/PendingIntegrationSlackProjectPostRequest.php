<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackProjectPostResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackProjectPostRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success', 'addBot', 'nudgeToConnectMainSlackIntegration', 'nudgeToUpdateMainSlackIntegration'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackProjectPost', $args));
	}
	
	public function get(string ...$fields): SlackChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationSlackProjectPostResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackProjectPostResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationSlackProjectPostResponse);
		
		return $response;
	}
}
