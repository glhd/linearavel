<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueLabelUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelUpdateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueLabelUpdate', $args));
	}
	
	public function get(string ...$fields): IssueLabelPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueLabelUpdateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IssueLabelUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueLabelUpdateResponse);
		
		return $response;
	}
}
