<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Project;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'name',
		'description',
		'slugId',
		'color',
		'sortOrder',
		'issueCountHistory',
		'completedIssueCountHistory',
		'scopeHistory',
		'completedScopeHistory',
		'inProgressScopeHistory',
		'slackNewIssue',
		'slackIssueComments',
		'slackIssueStatuses',
		'url',
		'progress',
		'scope',
		'state',
		'archivedAt',
		'icon',
		'projectUpdateRemindersPausedUntilAt',
		'startDate',
		'startDateResolution',
		'targetDate',
		'targetDateResolution',
		'startedAt',
		'pausedAt',
		'completedAt',
		'canceledAt',
		'autoArchivedAt',
		'trashed',
		'content',
		'contentState',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'project', $args));
	}
	
	public function get(string ...$fields): Project
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectResponse);
		
		return $response;
	}
}
