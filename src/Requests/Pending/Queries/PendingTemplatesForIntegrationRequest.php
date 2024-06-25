<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TemplatesForIntegrationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingTemplatesForIntegrationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'name', 'templateData', 'archivedAt', 'description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'templatesForIntegration', $args));
	}
	
	/** @returns Collection<int, Template> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TemplatesForIntegrationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplatesForIntegrationResponse::class, (string) $query))->throw();
		
		assert($response instanceof TemplatesForIntegrationResponse);
		
		return $response;
	}
}
