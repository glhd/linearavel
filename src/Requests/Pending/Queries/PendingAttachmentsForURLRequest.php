<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AttachmentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AttachmentsForURLResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAttachmentsForURLRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [
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
	
	public function response(string ...$fields): AttachmentsForURLResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AttachmentsForURLResponse::class, (string) $query))->throw();
		
		assert($response instanceof AttachmentsForURLResponse);
		
		return $response;
	}
}
