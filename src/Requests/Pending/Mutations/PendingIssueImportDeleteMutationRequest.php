<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportDeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['issueImportId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportDelete', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportDeletePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportDeleteMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportDeleteMutationResponse);
		
		return $response;
	}
}
