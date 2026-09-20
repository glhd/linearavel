<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PartnerOfferDetailsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\PartnerOfferDetailsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPartnerOfferDetailsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'partnerSlug', 'partnerName', 'token', 'discountType', 'discountValue', 'durationMonths'];

	protected const ARGUMENT_TYPES = ['slug' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'partnerOfferDetails', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ?PartnerOfferDetailsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PartnerOfferDetailsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PartnerOfferDetailsQueryResponse::class, $query))->throw();
		
		assert($response instanceof PartnerOfferDetailsQueryResponse);
		
		return $response;
	}
}
