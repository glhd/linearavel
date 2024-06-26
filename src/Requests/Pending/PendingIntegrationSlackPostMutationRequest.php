<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackPostMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackPostMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'addBot', 'nudgeToConnectMainSlackIntegration', 'nudgeToUpdateMainSlackIntegration'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackPost', $args));
	}
	
	public function get(string ...$fields): SlackChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationSlackPostMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackPostMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationSlackPostMutationResponse);
		
		return $response;
	}
}
