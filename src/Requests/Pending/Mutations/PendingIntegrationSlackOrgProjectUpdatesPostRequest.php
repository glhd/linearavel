<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackOrgProjectUpdatesPostResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackOrgProjectUpdatesPostRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackOrgProjectUpdatesPost', $args));
	}
	
	public function get(string ...$fields): SlackChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationSlackOrgProjectUpdatesPostResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackOrgProjectUpdatesPostResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationSlackOrgProjectUpdatesPostResponse);
		
		return $response;
	}
}