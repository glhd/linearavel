<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectSearchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SearchProjectsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSearchProjectsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.name',
		'nodes.description',
		'nodes.slugId',
		'nodes.color',
		'nodes.sortOrder',
		'nodes.issueCountHistory',
		'nodes.completedIssueCountHistory',
		'nodes.scopeHistory',
		'nodes.completedScopeHistory',
		'nodes.inProgressScopeHistory',
		'nodes.slackNewIssue',
		'nodes.slackIssueComments',
		'nodes.slackIssueStatuses',
		'nodes.url',
		'nodes.progress',
		'nodes.scope',
		'nodes.state',
		'nodes.metadata',
		'nodes.archivedAt',
		'nodes.icon',
		'nodes.projectUpdateRemindersPausedUntilAt',
		'nodes.startDate',
		'nodes.startDateResolution',
		'nodes.targetDate',
		'nodes.targetDateResolution',
		'nodes.startedAt',
		'nodes.pausedAt',
		'nodes.completedAt',
		'nodes.canceledAt',
		'nodes.autoArchivedAt',
		'nodes.trashed',
		'nodes.content',
		'nodes.contentState',
		'totalCount',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'searchProjects', $args));
	}
	
	public function get(string ...$fields): ProjectSearchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): SearchProjectsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SearchProjectsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof SearchProjectsQueryResponse);
		
		return $response;
	}
}
