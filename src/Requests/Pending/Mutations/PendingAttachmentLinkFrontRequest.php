<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FrontAttachmentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AttachmentLinkFrontResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentLinkFrontRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'attachmentLinkFront', $args));
	}
	
	public function get(string ...$fields): FrontAttachmentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentLinkFrontResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(AttachmentLinkFrontResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentLinkFrontResponse);
		
		return $response;
	}
}
