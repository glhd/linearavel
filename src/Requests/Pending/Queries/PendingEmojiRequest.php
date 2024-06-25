<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Emoji;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\EmojiResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmojiRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'url', 'source', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'emoji', $args));
	}
	
	public function get(string ...$fields): Emoji
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmojiResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmojiResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmojiResponse);
		
		return $response;
	}
}
