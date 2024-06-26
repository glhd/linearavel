<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueDescriptionUpdateFromFrontMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueDescriptionUpdateFromFrontMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueDescriptionUpdateFromFront', $args));
	}
	
	public function get(string ...$fields): IssuePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueDescriptionUpdateFromFrontMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueDescriptionUpdateFromFrontMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueDescriptionUpdateFromFrontMutationResponse);
		
		return $response;
	}
}
