<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PartnerProgramPartnerPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\PartnerProgramPartnersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingPartnerProgramPartnersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['partnerName', 'category'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'partnerProgramPartners', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, PartnerProgramPartnerPayload> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PartnerProgramPartnersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PartnerProgramPartnersQueryResponse::class, $query))->throw();
		
		assert($response instanceof PartnerProgramPartnersQueryResponse);
		
		return $response;
	}
}
