<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationSlackPersonalMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationSlackPersonalMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationSlackPersonal', $args));
	}
	
	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationSlackPersonalMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationSlackPersonalMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationSlackPersonalMutationResponse);
		
		return $response;
	}
}
