<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GoogleUserAccountAuthResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGoogleUserAccountAuthRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'googleUserAccountAuth', $args));
	}
	
	public function get(string ...$fields): AuthResolverResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GoogleUserAccountAuthResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(GoogleUserAccountAuthResponse::class, (string) $query))->throw();
		
		assert($response instanceof GoogleUserAccountAuthResponse);
		
		return $response;
	}
}
