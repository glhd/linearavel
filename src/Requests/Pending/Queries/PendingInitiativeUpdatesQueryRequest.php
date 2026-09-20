<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeUpdateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeUpdatesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeUpdatesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.body', 'nodes.reactionData', 'nodes.bodyData', 'nodes.slugId', 'nodes.health', 'nodes.isDiffHidden', 'nodes.url', 'nodes.isStale', 'nodes.commentCount', 'nodes.archivedAt', 'nodes.editedAt', 'nodes.infoSnapshot', 'nodes.diff', 'nodes.diffMarkdown'];

	protected const ARGUMENT_TYPES = ['filter' => 'InitiativeUpdateFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeUpdates', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeUpdateConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeUpdatesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeUpdatesQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeUpdatesQueryResponse);
		
		return $response;
	}
}
