<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeUpdateReminderPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CreateInitiativeUpdateReminderMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCreateInitiativeUpdateReminderMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['userId' => 'String', 'initiativeId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'createInitiativeUpdateReminder', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeUpdateReminderPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CreateInitiativeUpdateReminderMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CreateInitiativeUpdateReminderMutationResponse::class, $query))->throw();
		
		assert($response instanceof CreateInitiativeUpdateReminderMutationResponse);
		
		return $response;
	}
}
