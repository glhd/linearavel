<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Project;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'frequencyResolution', 'name', 'description', 'slugId', 'color', 'leadTeamId', 'sortOrder', 'prioritySortOrder', 'priority', 'issueCountHistory', 'completedIssueCountHistory', 'scopeHistory', 'completedScopeHistory', 'inProgressScopeHistory', 'progressHistory', 'currentProgress', 'slackNewIssue', 'slackIssueComments', 'slackIssueStatuses', 'labelIds', 'url', 'previousIdentifiers', 'resourceCount', 'progress', 'scope', 'state', 'priorityLabel', 'archivedAt', 'updateReminderFrequencyInWeeks', 'updateReminderFrequency', 'updateRemindersDay', 'updateRemindersHour', 'icon', 'projectUpdateRemindersPausedUntilAt', 'startDate', 'startDateResolution', 'targetDate', 'targetDateResolution', 'startedAt', 'completedAt', 'canceledAt', 'autoArchivedAt', 'trashed', 'health', 'healthUpdatedAt', 'identifier', 'slackChannelId', 'microsoftTeamsChannelId', 'content', 'contentState'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'project', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Project
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectQueryResponse);
		
		return $response;
	}
}
