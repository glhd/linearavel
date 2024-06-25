<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabel;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueLabelResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'isGroup', 'archivedAt', 'description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueLabel', $args));
	}
	
	public function get(string ...$fields): IssueLabel
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueLabelResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueLabelResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueLabelResponse);
		
		return $response;
	}
}
