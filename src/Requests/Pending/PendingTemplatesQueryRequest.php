<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TemplatesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingTemplatesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'name', 'templateData', 'archivedAt', 'description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'templates', $args));
	}
	
	/** @returns Collection<int, Template> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TemplatesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplatesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof TemplatesQueryResponse);
		
		return $response;
	}
}
