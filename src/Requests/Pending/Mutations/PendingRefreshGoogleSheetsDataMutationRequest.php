<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RefreshGoogleSheetsDataMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRefreshGoogleSheetsDataMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'refreshGoogleSheetsData', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RefreshGoogleSheetsDataMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RefreshGoogleSheetsDataMutationResponse::class, $query))->throw();
		
		assert($response instanceof RefreshGoogleSheetsDataMutationResponse);
		
		return $response;
	}
}
