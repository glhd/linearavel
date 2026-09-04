<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportProcessMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportProcessMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['mapping' => 'JSONObject!', 'issueImportId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportProcess', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportProcessMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportProcessMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportProcessMutationResponse);
		
		return $response;
	}
}
