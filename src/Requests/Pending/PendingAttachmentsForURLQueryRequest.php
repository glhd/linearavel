<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentsForURLQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentsForURLQueryRequest extends PendingLinearRequest
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
		parent::__construct($connector, GraphQueryBuilder::make('query', 'attachmentsForURL', $args));
	}
	
	public function get(string ...$fields): AttachmentConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AttachmentsForURLQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentsForURLQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentsForURLQueryResponse);
		
		return $response;
	}
}
