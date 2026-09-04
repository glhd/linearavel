<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['trash' => 'Boolean', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueArchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueArchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueArchiveMutationResponse);
		
		return $response;
	}
}
