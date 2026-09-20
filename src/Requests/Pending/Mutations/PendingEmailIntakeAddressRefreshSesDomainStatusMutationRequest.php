<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailIntakeAddressRefreshSesDomainStatusPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailIntakeAddressRefreshSesDomainStatusMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailIntakeAddressRefreshSesDomainStatusMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailIntakeAddressRefreshSesDomainStatus', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EmailIntakeAddressRefreshSesDomainStatusPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EmailIntakeAddressRefreshSesDomainStatusMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailIntakeAddressRefreshSesDomainStatusMutationResponse::class, $query))->throw();
		
		assert($response instanceof EmailIntakeAddressRefreshSesDomainStatusMutationResponse);
		
		return $response;
	}
}
