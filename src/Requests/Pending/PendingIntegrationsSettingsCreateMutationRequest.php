<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationsSettingsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationsSettingsCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationsSettingsCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationsSettingsCreate', $args));
	}
	
	public function get(string ...$fields): IntegrationsSettingsPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationsSettingsCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationsSettingsCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationsSettingsCreateMutationResponse);
		
		return $response;
	}
}
