<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FavoritePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FavoriteUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFavoriteUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'FavoriteUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'favoriteUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): FavoritePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): FavoriteUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FavoriteUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof FavoriteUpdateMutationResponse);
		
		return $response;
	}
}
