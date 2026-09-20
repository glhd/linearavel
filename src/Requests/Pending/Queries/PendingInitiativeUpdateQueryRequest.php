<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeUpdate;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeUpdateQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeUpdateQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'body', 'reactionData', 'bodyData', 'slugId', 'health', 'isDiffHidden', 'url', 'isStale', 'commentCount', 'archivedAt', 'editedAt', 'infoSnapshot', 'diff', 'diffMarkdown'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeUpdate
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeUpdateQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeUpdateQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeUpdateQueryResponse);
		
		return $response;
	}
}
