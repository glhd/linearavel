<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueToReleasePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueToReleaseCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueToReleaseCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'IssueToReleaseCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueToReleaseCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueToReleasePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueToReleaseCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueToReleaseCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueToReleaseCreateMutationResponse);
		
		return $response;
	}
}
