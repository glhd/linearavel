<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplicationRotateSecretPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OauthApplicationRotateSecretMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationRotateSecretMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'clientSecret'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'oauthApplicationRotateSecret', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplicationRotateSecretPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationRotateSecretMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationRotateSecretMutationResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationRotateSecretMutationResponse);
		
		return $response;
	}
}
