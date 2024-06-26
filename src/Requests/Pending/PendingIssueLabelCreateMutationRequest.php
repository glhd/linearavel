<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueLabelCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueLabelCreate', $args));
	}
	
	public function get(string ...$fields): IssueLabelPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueLabelCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueLabelCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueLabelCreateMutationResponse);
		
		return $response;
	}
}
