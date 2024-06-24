<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmojiPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmojiCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmojiCreateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emojiCreate', $args));
	}
	
	public function get(string ...$fields): EmojiPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmojiCreateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(EmojiCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmojiCreateResponse);
		
		return $response;
	}
}
