<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.frequencyResolution', 'nodes.name', 'nodes.slugId', 'nodes.sortOrder', 'nodes.status', 'nodes.labelIds', 'nodes.priority', 'nodes.prioritySortOrder', 'nodes.url', 'nodes.visibility', 'nodes.previousIdentifiers', 'nodes.archivedAt', 'nodes.updateReminderFrequencyInWeeks', 'nodes.updateReminderFrequency', 'nodes.updateRemindersDay', 'nodes.updateRemindersHour', 'nodes.description', 'nodes.color', 'nodes.icon', 'nodes.trashed', 'nodes.targetDate', 'nodes.targetDateResolution', 'nodes.health', 'nodes.healthUpdatedAt', 'nodes.startedAt', 'nodes.completedAt', 'nodes.canceledAt', 'nodes.identifier', 'nodes.content'];

	protected const ARGUMENT_TYPES = ['filter' => 'InitiativeFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'sort' => '[InitiativeSortInput!]'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiatives', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativesQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativesQueryResponse);
		
		return $response;
	}
}
