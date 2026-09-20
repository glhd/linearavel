<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthenticationSessionResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UserSessionsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingUserSessionsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['createdAt', 'id', 'type', 'countryCodes', 'updatedAt', 'name', 'detailedName', 'isCurrentSession', 'ip', 'locationCountry', 'locationCountryCode', 'locationRegionCode', 'locationCity', 'userAgent', 'browserType', 'service', 'lastActiveAt', 'location', 'operatingSystem', 'client'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'userSessions', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, AuthenticationSessionResponse> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserSessionsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSessionsQueryResponse::class, $query))->throw();
		
		assert($response instanceof UserSessionsQueryResponse);
		
		return $response;
	}
}
