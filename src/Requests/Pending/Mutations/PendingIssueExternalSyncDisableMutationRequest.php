<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueExternalSyncDisableMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueExternalSyncDisableMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['attachmentId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueExternalSyncDisable', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssuePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueExternalSyncDisableMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueExternalSyncDisableMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueExternalSyncDisableMutationResponse);
		
		return $response;
	}
}
