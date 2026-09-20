<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ViewPreferences;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UserViewPreferencesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserViewPreferencesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'viewType', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['viewType' => 'ViewType!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'userViewPreferences', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ?ViewPreferences
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserViewPreferencesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserViewPreferencesQueryResponse::class, $query))->throw();
		
		assert($response instanceof UserViewPreferencesQueryResponse);
		
		return $response;
	}
}
