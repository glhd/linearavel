<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectLinkPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectLinkUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectLinkUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ProjectLinkUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectLinkUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectLinkPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectLinkUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectLinkUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectLinkUpdateMutationResponse);
		
		return $response;
	}
}
