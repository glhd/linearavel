<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ViewPreferencesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ViewPreferencesUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingViewPreferencesUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'viewPreferencesUpdate', $args));
	}
	
	public function get(string ...$fields): ViewPreferencesPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ViewPreferencesUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ViewPreferencesUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ViewPreferencesUpdateMutationResponse);
		
		return $response;
	}
}
