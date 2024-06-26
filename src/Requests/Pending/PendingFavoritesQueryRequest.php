<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FavoriteConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\FavoritesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoritesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.type',
		'nodes.sortOrder',
		'nodes.archivedAt',
		'nodes.folderName',
		'nodes.projectTab',
		'nodes.predefinedViewType',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'favorites', $args));
	}
	
	public function get(string ...$fields): FavoriteConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FavoritesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FavoritesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof FavoritesQueryResponse);
		
		return $response;
	}
}
