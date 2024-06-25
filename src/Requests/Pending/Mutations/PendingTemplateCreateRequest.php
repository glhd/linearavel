<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TemplatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TemplateCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTemplateCreateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'templateCreate', $args));
	}
	
	public function get(string ...$fields): TemplatePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TemplateCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplateCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof TemplateCreateResponse);
		
		return $response;
	}
}
