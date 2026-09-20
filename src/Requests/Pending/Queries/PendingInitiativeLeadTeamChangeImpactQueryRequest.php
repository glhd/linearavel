<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeLeadTeamChangeImpact;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeLeadTeamChangeImpactQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeLeadTeamChangeImpactQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['affectedDescendantCount', 'visibilityMayChange'];

	protected const ARGUMENT_TYPES = ['leadTeamId' => 'String', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeLeadTeamChangeImpact', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeLeadTeamChangeImpact
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeLeadTeamChangeImpactQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeLeadTeamChangeImpactQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeLeadTeamChangeImpactQueryResponse);
		
		return $response;
	}
}
