<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueBatchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueBatchUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueBatchUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'IssueUpdateInput!', 'ids' => '[UUID!]!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueBatchUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueBatchPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueBatchUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueBatchUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueBatchUpdateMutationResponse);
		
		return $response;
	}
}
