<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueBatchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueBatchCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueBatchCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'IssueBatchCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueBatchCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueBatchPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueBatchCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueBatchCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueBatchCreateMutationResponse);
		
		return $response;
	}
}
