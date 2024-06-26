<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackProjectPostMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackProjectPostMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'addBot', 'nudgeToConnectMainSlackIntegration', 'nudgeToUpdateMainSlackIntegration'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackProjectPost', $args));
	}
	
	public function get(string ...$fields): SlackChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationSlackProjectPostMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackProjectPostMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationSlackProjectPostMutationResponse);
		
		return $response;
	}
}
