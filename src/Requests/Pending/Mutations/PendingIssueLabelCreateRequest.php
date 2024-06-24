<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueLabelCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelCreateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueLabelCreate', $args));
	}
	
	public function get(string ...$fields): IssueLabelPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueLabelCreateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IssueLabelCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueLabelCreateResponse);
		
		return $response;
	}
}
