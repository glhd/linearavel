<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailIntakeAddressPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailIntakeAddressUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailIntakeAddressUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailIntakeAddressUpdate', $args));
	}
	
	public function get(string ...$fields): EmailIntakeAddressPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmailIntakeAddressUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailIntakeAddressUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmailIntakeAddressUpdateMutationResponse);
		
		return $response;
	}
}
