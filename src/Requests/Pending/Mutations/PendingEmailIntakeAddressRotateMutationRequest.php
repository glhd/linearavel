<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailIntakeAddressPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailIntakeAddressRotateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailIntakeAddressRotateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailIntakeAddressRotate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EmailIntakeAddressPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EmailIntakeAddressRotateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailIntakeAddressRotateMutationResponse::class, $query))->throw();
		
		assert($response instanceof EmailIntakeAddressRotateMutationResponse);
		
		return $response;
	}
}
