<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OauthApplicationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'clientId', 'name', 'developer', 'developerUrl', 'redirectUris', 'distribution', 'webhookResourceTypes', 'webhookEnabled', 'grantTypes', 'createdAt', 'updatedAt', 'description', 'imageUrl', 'webhookUrl'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'oauthApplication', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplication
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationQueryResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationQueryResponse);
		
		return $response;
	}
}
