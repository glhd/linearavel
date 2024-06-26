<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailUnsubscribePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailUnsubscribeMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailUnsubscribeMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailUnsubscribe', $args));
	}
	
	public function get(string ...$fields): EmailUnsubscribePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmailUnsubscribeMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailUnsubscribeMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmailUnsubscribeMutationResponse);
		
		return $response;
	}
}
