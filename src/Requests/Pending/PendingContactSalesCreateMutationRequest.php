<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ContactPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ContactSalesCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingContactSalesCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'contactSalesCreate', $args));
	}
	
	public function get(string ...$fields): ContactPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ContactSalesCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ContactSalesCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ContactSalesCreateMutationResponse);
		
		return $response;
	}
}
