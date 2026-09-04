<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueUnarchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueUnarchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueUnarchiveMutationResponse);
		
		return $response;
	}
}
