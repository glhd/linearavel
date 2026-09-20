<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueToReleaseDeleteByIssueAndReleaseMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueToReleaseDeleteByIssueAndReleaseMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entityId'];

	protected const ARGUMENT_TYPES = ['releaseId' => 'String!', 'issueId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueToReleaseDeleteByIssueAndRelease', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueToReleaseDeleteByIssueAndReleaseMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueToReleaseDeleteByIssueAndReleaseMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueToReleaseDeleteByIssueAndReleaseMutationResponse);
		
		return $response;
	}
}
