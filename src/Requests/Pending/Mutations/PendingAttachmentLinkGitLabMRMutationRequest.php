<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkGitLabMRMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkGitLabMRMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['createAsUser' => 'String', 'displayIconUrl' => 'String', 'title' => 'String', 'issueId' => 'String!', 'id' => 'String', 'url' => 'String!', 'projectPathWithNamespace' => 'String!', 'number' => 'Float!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkGitLabMR', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AttachmentLinkGitLabMRMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkGitLabMRMutationResponse::class, $query))->throw();
		
		assert($response instanceof AttachmentLinkGitLabMRMutationResponse);
		
		return $response;
	}
}
