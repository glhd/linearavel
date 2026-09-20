<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabel;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueLabelQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'isGroup', 'archivedAt', 'description'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueLabel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueLabel
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueLabelQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueLabelQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueLabelQueryResponse);
		
		return $response;
	}
}
