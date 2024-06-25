<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FavoritePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FavoriteCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoriteCreateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'favoriteCreate', $args));
	}
	
	public function get(string ...$fields): FavoritePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FavoriteCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FavoriteCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof FavoriteCreateResponse);
		
		return $response;
	}
}
