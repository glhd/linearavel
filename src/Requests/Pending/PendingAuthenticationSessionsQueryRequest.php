<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthenticationSessionResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AuthenticationSessionsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingAuthenticationSessionsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'type',
		'countryCodes',
		'createdAt',
		'updatedAt',
		'name',
		'isCurrentSession',
		'ip',
		'locationCountry',
		'locationCountryCode',
		'locationCity',
		'userAgent',
		'browserType',
		'lastActiveAt',
		'location',
		'operatingSystem',
		'client',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'authenticationSessions', $args));
	}
	
	/** @returns Collection<int, AuthenticationSessionResponse> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AuthenticationSessionsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AuthenticationSessionsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof AuthenticationSessionsQueryResponse);
		
		return $response;
	}
}
