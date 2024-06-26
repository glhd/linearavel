<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomViewUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customViewUpdate', $args));
	}
	
	public function get(string ...$fields): CustomViewPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewUpdateMutationResponse);
		
		return $response;
	}
}
