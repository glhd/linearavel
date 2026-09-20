<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueVcsBranchSearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueVcsBranchSearchQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'number', 'title', 'priority', 'boardOrder', 'sortOrder', 'prioritySortOrder', 'labelIds', 'previousIdentifiers', 'reactionData', 'priorityLabel', 'inheritsSharedAccess', 'identifier', 'url', 'branchName', 'customerTicketCount', 'archivedAt', 'estimate', 'startedAt', 'completedAt', 'startedTriageAt', 'triagedAt', 'canceledAt', 'autoClosedAt', 'autoArchivedAt', 'dueDate', 'slaStartedAt', 'slaMediumRiskAt', 'slaHighRiskAt', 'slaBreachesAt', 'slaType', 'addedToProjectAt', 'addedToCycleAt', 'addedToTeamAt', 'trashed', 'snoozedUntilAt', 'suggestionsGeneratedAt', 'activitySummary', 'subIssueSortOrder', 'trusted', 'integrationSourceType', 'description', 'descriptionState'];

	protected const ARGUMENT_TYPES = ['branchName' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueVcsBranchSearch', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ?Issue
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueVcsBranchSearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueVcsBranchSearchQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueVcsBranchSearchQueryResponse);
		
		return $response;
	}
}
