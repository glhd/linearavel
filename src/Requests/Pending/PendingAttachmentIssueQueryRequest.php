<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentIssueQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentIssueQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'number',
		'title',
		'priority',
		'boardOrder',
		'sortOrder',
		'labelIds',
		'previousIdentifiers',
		'priorityLabel',
		'identifier',
		'url',
		'branchName',
		'customerTicketCount',
		'archivedAt',
		'estimate',
		'startedAt',
		'completedAt',
		'startedTriageAt',
		'triagedAt',
		'canceledAt',
		'autoClosedAt',
		'autoArchivedAt',
		'dueDate',
		'slaStartedAt',
		'slaBreachesAt',
		'trashed',
		'snoozedUntilAt',
		'subIssueSortOrder',
		'integrationSourceType',
		'description',
		'descriptionData',
		'descriptionState',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'attachmentIssue', $args));
	}
	
	public function get(string ...$fields): Issue
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentIssueQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentIssueQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentIssueQueryResponse);
		
		return $response;
	}
}
