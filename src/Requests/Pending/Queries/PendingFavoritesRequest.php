<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FavoriteConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\FavoritesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoritesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'favorites', $args));
	}
	
	public function get(string ...$fields): FavoriteConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FavoritesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(FavoritesResponse::class, (string) $query))->throw();
		
		assert($response instanceof FavoritesResponse);
		
		return $response;
	}
}
