<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkSlackMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkSlackMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['createAsUser' => 'String', 'displayIconUrl' => 'String', 'title' => 'String', 'channel' => 'String!', 'ts' => 'String', 'latest' => 'String!', 'issueId' => 'String!', 'url' => 'String!', 'id' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkSlack', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AttachmentLinkSlackMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkSlackMutationResponse::class, $query))->throw();
		
		assert($response instanceof AttachmentLinkSlackMutationResponse);
		
		return $response;
	}
}
