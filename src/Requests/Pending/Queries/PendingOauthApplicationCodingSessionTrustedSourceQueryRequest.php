<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplicationCodingSessionTrustedSource;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OauthApplicationCodingSessionTrustedSourceQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationCodingSessionTrustedSourceQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['enabled', 'disabledReason'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'oauthApplicationCodingSessionTrustedSource', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplicationCodingSessionTrustedSource
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationCodingSessionTrustedSourceQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationCodingSessionTrustedSourceQueryResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationCodingSessionTrustedSourceQueryResponse);
		
		return $response;
	}
}
