<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueFigmaFileKeySearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueFigmaFileKeySearchQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.number', 'nodes.title', 'nodes.priority', 'nodes.boardOrder', 'nodes.sortOrder', 'nodes.prioritySortOrder', 'nodes.labelIds', 'nodes.previousIdentifiers', 'nodes.reactionData', 'nodes.priorityLabel', 'nodes.inheritsSharedAccess', 'nodes.identifier', 'nodes.url', 'nodes.branchName', 'nodes.customerTicketCount', 'nodes.archivedAt', 'nodes.estimate', 'nodes.startedAt', 'nodes.completedAt', 'nodes.startedTriageAt', 'nodes.triagedAt', 'nodes.canceledAt', 'nodes.autoClosedAt', 'nodes.autoArchivedAt', 'nodes.dueDate', 'nodes.slaStartedAt', 'nodes.slaMediumRiskAt', 'nodes.slaHighRiskAt', 'nodes.slaBreachesAt', 'nodes.slaType', 'nodes.addedToProjectAt', 'nodes.addedToCycleAt', 'nodes.addedToTeamAt', 'nodes.trashed', 'nodes.snoozedUntilAt', 'nodes.suggestionsGeneratedAt', 'nodes.activitySummary', 'nodes.subIssueSortOrder', 'nodes.trusted', 'nodes.integrationSourceType', 'nodes.description', 'nodes.descriptionState'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'fileKey' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueFigmaFileKeySearch', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueFigmaFileKeySearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueFigmaFileKeySearchQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueFigmaFileKeySearchQueryResponse);
		
		return $response;
	}
}
