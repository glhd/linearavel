<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EntityExternalLink;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\EntityExternalLinkQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEntityExternalLinkQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'url', 'label', 'sortOrder', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'entityExternalLink', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EntityExternalLink
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EntityExternalLinkQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EntityExternalLinkQueryResponse::class, $query))->throw();
		
		assert($response instanceof EntityExternalLinkQueryResponse);
		
		return $response;
	}
}
