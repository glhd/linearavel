<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerNeedPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerNeedCreateFromAttachmentMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerNeedCreateFromAttachmentMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomerNeedCreateFromAttachmentInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerNeedCreateFromAttachment', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerNeedPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerNeedCreateFromAttachmentMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerNeedCreateFromAttachmentMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerNeedCreateFromAttachmentMutationResponse);
		
		return $response;
	}
}
