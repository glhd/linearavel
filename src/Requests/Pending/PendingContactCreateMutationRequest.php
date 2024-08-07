<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ContactPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ContactCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingContactCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'contactCreate', $args));
	}
	
	public function get(string ...$fields): ContactPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ContactCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ContactCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ContactCreateMutationResponse);
		
		return $response;
	}
}
