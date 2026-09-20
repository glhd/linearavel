<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkSalesforceMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkSalesforceMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['createAsUser' => 'String', 'displayIconUrl' => 'String', 'title' => 'String', 'issueId' => 'String!', 'id' => 'String', 'url' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkSalesforce', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AttachmentLinkSalesforceMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkSalesforceMutationResponse::class, $query))->throw();
		
		assert($response instanceof AttachmentLinkSalesforceMutationResponse);
		
		return $response;
	}
}
