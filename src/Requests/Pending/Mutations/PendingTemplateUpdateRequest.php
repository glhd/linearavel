<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TemplatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TemplateUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTemplateUpdateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'templateUpdate', $args));
	}
	
	public function get(string ...$fields): TemplatePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TemplateUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplateUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof TemplateUpdateResponse);
		
		return $response;
	}
}
