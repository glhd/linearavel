<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SuccessPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueRequestSolubilityPredictionMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRequestSolubilityPredictionMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueRequestSolubilityPrediction', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): SuccessPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueRequestSolubilityPredictionMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueRequestSolubilityPredictionMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueRequestSolubilityPredictionMutationResponse);
		
		return $response;
	}
}
