<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmojiPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmojiCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmojiCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emojiCreate', $args));
	}
	
	public function get(string ...$fields): EmojiPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmojiCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmojiCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmojiCreateMutationResponse);
		
		return $response;
	}
}
