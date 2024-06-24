<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ContactPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ContactSalesCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingContactSalesCreateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'contactSalesCreate', $args));
	}
	
	public function get(string ...$fields): ContactPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ContactSalesCreateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ContactSalesCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof ContactSalesCreateResponse);
		
		return $response;
	}
}
