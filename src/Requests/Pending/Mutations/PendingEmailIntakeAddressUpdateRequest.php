<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailIntakeAddressPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailIntakeAddressUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailIntakeAddressUpdateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailIntakeAddressUpdate', $args));
	}
	
	public function get(string ...$fields): EmailIntakeAddressPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmailIntakeAddressUpdateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(EmailIntakeAddressUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmailIntakeAddressUpdateResponse);
		
		return $response;
	}
}
