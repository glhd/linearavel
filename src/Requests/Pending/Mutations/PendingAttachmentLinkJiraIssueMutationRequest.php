<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkJiraIssueMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkJiraIssueMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['issueId' => 'String!', 'jiraIssueId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkJiraIssue', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AttachmentLinkJiraIssueMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkJiraIssueMutationResponse::class, $query))->throw();
		
		assert($response instanceof AttachmentLinkJiraIssueMutationResponse);
		
		return $response;
	}
}
