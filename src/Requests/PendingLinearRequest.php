<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Responses\LinearResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLinearRequest
{
	public function __construct(
		protected string $name,
		protected LinearConnector $connector,
		protected GraphQueryBuilder $query,
	) {
	}
	
	public function get(string ...$fields): LinearResponse
	{
		$query = $this->query->withFields($fields);
		
		$request = new LinearRequest((string) $query);
		
		return $this->connector->send($request);
	}
}
