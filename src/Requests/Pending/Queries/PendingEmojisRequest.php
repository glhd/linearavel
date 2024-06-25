<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmojiConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\EmojisResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmojisRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.url', 'nodes.source', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'emojis', $args));
	}
	
	public function get(string ...$fields): EmojiConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmojisResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmojisResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmojisResponse);
		
		return $response;
	}
}
