<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FavoritePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FavoriteUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoriteUpdateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'favoriteUpdate', $args));
	}
	
	public function get(string ...$fields): FavoritePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FavoriteUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FavoriteUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof FavoriteUpdateResponse);
		
		return $response;
	}
}
