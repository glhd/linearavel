<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Initiative;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'frequencyResolution', 'name', 'slugId', 'sortOrder', 'status', 'labelIds', 'priority', 'prioritySortOrder', 'url', 'visibility', 'previousIdentifiers', 'archivedAt', 'updateReminderFrequencyInWeeks', 'updateReminderFrequency', 'updateRemindersDay', 'updateRemindersHour', 'description', 'color', 'icon', 'trashed', 'targetDate', 'targetDateResolution', 'health', 'healthUpdatedAt', 'startedAt', 'completedAt', 'canceledAt', 'identifier', 'content'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiative', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Initiative
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeQueryResponse);
		
		return $response;
	}
}
