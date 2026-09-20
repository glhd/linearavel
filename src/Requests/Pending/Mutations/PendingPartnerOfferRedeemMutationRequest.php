<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PartnerOfferRedeemPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PartnerOfferRedeemMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPartnerOfferRedeemMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['organizationId' => 'String!', 'token' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'partnerOfferRedeem', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): PartnerOfferRedeemPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PartnerOfferRedeemMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PartnerOfferRedeemMutationResponse::class, $query))->throw();
		
		assert($response instanceof PartnerOfferRedeemMutationResponse);
		
		return $response;
	}
}
