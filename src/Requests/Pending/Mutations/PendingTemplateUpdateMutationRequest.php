<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TemplatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TemplateUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTemplateUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'TemplateUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'templateUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TemplatePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TemplateUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplateUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof TemplateUpdateMutationResponse);
		
		return $response;
	}
}
