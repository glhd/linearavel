<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportCreateCSVJiraMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCreateCSVJiraMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['organizationId' => 'String', 'teamId' => 'String', 'teamName' => 'String', 'csvUrl' => 'String!', 'jiraHostname' => 'String', 'jiraToken' => 'String', 'jiraEmail' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportCreateCSVJira', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportCreateCSVJiraMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCreateCSVJiraMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportCreateCSVJiraMutationResponse);
		
		return $response;
	}
}
