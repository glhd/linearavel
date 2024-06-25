<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SsoUrlFromEmailResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SsoUrlFromEmailResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSsoUrlFromEmailRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['success', 'samlSsoUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'ssoUrlFromEmail', $args));
	}
	
	public function get(string ...$fields): SsoUrlFromEmailResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): SsoUrlFromEmailResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SsoUrlFromEmailResponse::class, (string) $query))->throw();
		
		assert($response instanceof SsoUrlFromEmailResponse);
		
		return $response;
	}
}
