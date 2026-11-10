<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TemplateSearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingTemplateSearchQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'name', 'templateData', 'sortOrder', 'hasFormFields', 'archivedAt', 'description', 'icon', 'color', 'lastAppliedAt', 'content'];

	protected const ARGUMENT_TYPES = ['includeArchived' => 'Boolean', 'first' => 'Int', 'filter' => 'TemplateFilter'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'templateSearch', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, Template> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TemplateSearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplateSearchQueryResponse::class, $query))->throw();
		
		assert($response instanceof TemplateSearchQueryResponse);
		
		return $response;
	}
}
