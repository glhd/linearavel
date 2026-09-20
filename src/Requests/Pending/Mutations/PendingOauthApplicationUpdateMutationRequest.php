<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplicationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OauthApplicationUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['input' => 'OAuthApplicationUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'oauthApplicationUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplicationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationUpdateMutationResponse);
		
		return $response;
	}
}
