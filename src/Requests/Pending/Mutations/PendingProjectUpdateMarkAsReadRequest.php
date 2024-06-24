<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateWithInteractionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectUpdateMarkAsReadResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateMarkAsReadRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectUpdateMarkAsRead', $args));
	}
	
	public function get(string ...$fields): ProjectUpdateWithInteractionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateMarkAsReadResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateMarkAsReadResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateMarkAsReadResponse);
		
		return $response;
	}
}
