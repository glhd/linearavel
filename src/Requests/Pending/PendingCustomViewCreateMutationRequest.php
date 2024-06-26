<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomViewCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customViewCreate', $args));
	}
	
	public function get(string ...$fields): CustomViewPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewCreateMutationResponse);
		
		return $response;
	}
}
