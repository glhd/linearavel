<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationsSettingsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationsSettingsCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationsSettingsCreateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationsSettingsCreate', $args));
	}
	
	public function get(string ...$fields): IntegrationsSettingsPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationsSettingsCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationsSettingsCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationsSettingsCreateResponse);
		
		return $response;
	}
}
