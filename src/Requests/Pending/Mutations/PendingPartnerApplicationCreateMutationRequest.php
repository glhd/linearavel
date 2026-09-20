<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ContactPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PartnerApplicationCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPartnerApplicationCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['input' => 'PartnerApplicationCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'partnerApplicationCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ContactPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PartnerApplicationCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PartnerApplicationCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof PartnerApplicationCreateMutationResponse);
		
		return $response;
	}
}
