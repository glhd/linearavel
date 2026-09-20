<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationTemplate;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationTemplateQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationTemplateQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'archivedAt', 'foreignEntityId'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationTemplate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationTemplate
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationTemplateQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationTemplateQueryResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationTemplateQueryResponse);
		
		return $response;
	}
}
