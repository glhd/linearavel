<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ViewPreferencesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ViewPreferencesUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingViewPreferencesUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ViewPreferencesUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'viewPreferencesUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ViewPreferencesPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ViewPreferencesUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ViewPreferencesUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof ViewPreferencesUpdateMutationResponse);
		
		return $response;
	}
}
