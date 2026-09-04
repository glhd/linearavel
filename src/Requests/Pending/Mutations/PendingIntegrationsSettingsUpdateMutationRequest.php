<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationsSettingsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationsSettingsUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationsSettingsUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'IntegrationsSettingsUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationsSettingsUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationsSettingsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationsSettingsUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationsSettingsUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationsSettingsUpdateMutationResponse);
		
		return $response;
	}
}
