<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueLabelRetireMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelRetireMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueLabelRetire', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueLabelPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueLabelRetireMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueLabelRetireMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueLabelRetireMutationResponse);
		
		return $response;
	}
}
