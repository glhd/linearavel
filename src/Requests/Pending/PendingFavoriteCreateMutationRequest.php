<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FavoritePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FavoriteCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoriteCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'favoriteCreate', $args));
	}
	
	public function get(string ...$fields): FavoritePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FavoriteCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FavoriteCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof FavoriteCreateMutationResponse);
		
		return $response;
	}
}
