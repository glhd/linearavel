<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkDiscordMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkDiscordMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkDiscord', $args));
	}
	
	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentLinkDiscordMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkDiscordMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentLinkDiscordMutationResponse);
		
		return $response;
	}
}
