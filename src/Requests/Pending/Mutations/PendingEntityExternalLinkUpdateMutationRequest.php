<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EntityExternalLinkPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EntityExternalLinkUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEntityExternalLinkUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'EntityExternalLinkUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'entityExternalLinkUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EntityExternalLinkPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EntityExternalLinkUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EntityExternalLinkUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof EntityExternalLinkUpdateMutationResponse);
		
		return $response;
	}
}
