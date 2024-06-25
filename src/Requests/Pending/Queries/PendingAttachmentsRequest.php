<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentsRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.title',
		'nodes.url',
		'nodes.metadata',
		'nodes.groupBySource',
		'nodes.archivedAt',
		'nodes.subtitle',
		'nodes.source',
		'nodes.sourceType',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'attachments', $args));
	}
	
	public function get(string ...$fields): AttachmentConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentsResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentsResponse);
		
		return $response;
	}
}
