<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueFigmaFileKeySearchResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueFigmaFileKeySearchRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueFigmaFileKeySearch', $args));
	}
	
	public function get(string ...$fields): IssueConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueFigmaFileKeySearchResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IssueFigmaFileKeySearchResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueFigmaFileKeySearchResponse);
		
		return $response;
	}
}
