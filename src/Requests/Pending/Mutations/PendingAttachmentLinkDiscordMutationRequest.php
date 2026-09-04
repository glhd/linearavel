<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkDiscordMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkDiscordMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['createAsUser' => 'String', 'displayIconUrl' => 'String', 'title' => 'String', 'issueId' => 'String!', 'id' => 'String', 'channelId' => 'String!', 'messageId' => 'String!', 'url' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkDiscord', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AttachmentLinkDiscordMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkDiscordMutationResponse::class, $query))->throw();
		
		assert($response instanceof AttachmentLinkDiscordMutationResponse);
		
		return $response;
	}
}
