<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Emoji;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\EmojiQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmojiQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'url', 'source', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'emoji', $args));
	}
	
	public function get(string ...$fields): Emoji
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmojiQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmojiQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmojiQueryResponse);
		
		return $response;
	}
}
