<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateWithInteractionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectUpdateMarkAsReadMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateMarkAsReadMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectUpdateMarkAsRead', $args));
	}
	
	public function get(string ...$fields): ProjectUpdateWithInteractionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateMarkAsReadMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateMarkAsReadMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateMarkAsReadMutationResponse);
		
		return $response;
	}
}
