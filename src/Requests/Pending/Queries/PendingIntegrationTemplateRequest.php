<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationTemplate;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationTemplateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationTemplateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'archivedAt', 'foreignEntityId'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationTemplate', $args));
	}
	
	public function get(string ...$fields): IntegrationTemplate
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationTemplateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationTemplateResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationTemplateResponse);
		
		return $response;
	}
}
