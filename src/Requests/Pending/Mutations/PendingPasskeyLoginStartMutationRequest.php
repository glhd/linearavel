<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PasskeyLoginStartResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PasskeyLoginStartMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPasskeyLoginStartMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'options'];

	protected const ARGUMENT_TYPES = ['authId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'passkeyLoginStart', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): PasskeyLoginStartResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PasskeyLoginStartMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PasskeyLoginStartMutationResponse::class, $query))->throw();
		
		assert($response instanceof PasskeyLoginStartMutationResponse);
		
		return $response;
	}
}
