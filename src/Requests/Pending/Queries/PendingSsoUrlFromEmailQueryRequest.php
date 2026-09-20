<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SsoUrlFromEmailResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SsoUrlFromEmailQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSsoUrlFromEmailQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'samlSsoUrl'];

	protected const ARGUMENT_TYPES = ['isDesktop' => 'Boolean', 'email' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'ssoUrlFromEmail', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): SsoUrlFromEmailResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): SsoUrlFromEmailQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SsoUrlFromEmailQueryResponse::class, $query))->throw();
		
		assert($response instanceof SsoUrlFromEmailQueryResponse);
		
		return $response;
	}
}
