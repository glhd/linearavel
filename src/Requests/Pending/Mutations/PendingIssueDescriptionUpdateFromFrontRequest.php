<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueDescriptionUpdateFromFrontResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueDescriptionUpdateFromFrontRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): IssueDescriptionUpdateFromFrontResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueDescriptionUpdateFromFrontResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueDescriptionUpdateFromFrontResponse);
		
		return $response;
	}
}
