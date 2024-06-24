<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueRemoveLabelResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRemoveLabelRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueRemoveLabel', $args));
	}
	
	public function get(string ...$fields): IssuePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueRemoveLabelResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IssueRemoveLabelResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueRemoveLabelResponse);
		
		return $response;
	}
}