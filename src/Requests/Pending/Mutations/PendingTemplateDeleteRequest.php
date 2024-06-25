<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TemplateDeleteResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTemplateDeleteRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entityId'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'templateDelete', $args));
	}
	
	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TemplateDeleteResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TemplateDeleteResponse::class, (string) $query))->throw();
		
		assert($response instanceof TemplateDeleteResponse);
		
		return $response;
	}
}
