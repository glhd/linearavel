<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TemplateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTemplateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'name', 'templateData', 'archivedAt', 'description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'template', $args));
	}
	
	public function get(string ...$fields): Template
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TemplateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplateResponse::class, (string) $query))->throw();
		
		assert($response instanceof TemplateResponse);
		
		return $response;
	}
}
