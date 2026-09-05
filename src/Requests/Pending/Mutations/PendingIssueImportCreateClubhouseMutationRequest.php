<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportCreateClubhouseMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCreateClubhouseMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['organizationId' => 'String', 'teamId' => 'String', 'teamName' => 'String', 'clubhouseToken' => 'String!', 'clubhouseGroupName' => 'String!', 'instantProcess' => 'Boolean', 'includeClosedIssues' => 'Boolean', 'id' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportCreateClubhouse', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportCreateClubhouseMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCreateClubhouseMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportCreateClubhouseMutationResponse);
		
		return $response;
	}
}
