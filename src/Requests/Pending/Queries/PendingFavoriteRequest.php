<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Favorite;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\FavoriteResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoriteRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'sortOrder', 'archivedAt', 'folderName', 'projectTab', 'predefinedViewType'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'favorite', $args));
	}
	
	public function get(string ...$fields): Favorite
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FavoriteResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FavoriteResponse::class, (string) $query))->throw();
		
		assert($response instanceof FavoriteResponse);
		
		return $response;
	}
}
