<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplicationCreatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OauthApplicationCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'clientSecret', 'webhookSecret'];

	protected const ARGUMENT_TYPES = ['input' => 'OAuthApplicationCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'oauthApplicationCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplicationCreatePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationCreateMutationResponse);
		
		return $response;
	}
}
