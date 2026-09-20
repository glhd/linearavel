<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TriageResponsibilityPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TriageResponsibilityCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTriageResponsibilityCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'TriageResponsibilityCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'triageResponsibilityCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TriageResponsibilityPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TriageResponsibilityCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TriageResponsibilityCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof TriageResponsibilityCreateMutationResponse);
		
		return $response;
	}
}
