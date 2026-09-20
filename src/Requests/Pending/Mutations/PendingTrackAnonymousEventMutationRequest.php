<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EventTrackingPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TrackAnonymousEventMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTrackAnonymousEventMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['input' => 'EventTrackingInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'trackAnonymousEvent', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EventTrackingPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TrackAnonymousEventMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TrackAnonymousEventMutationResponse::class, $query))->throw();
		
		assert($response instanceof TrackAnonymousEventMutationResponse);
		
		return $response;
	}
}
