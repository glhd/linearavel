<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OriginInstallationCancelPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OriginInstallationCancelMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOriginInstallationCancelMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['installationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'originInstallationCancel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OriginInstallationCancelPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OriginInstallationCancelMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OriginInstallationCancelMutationResponse::class, $query))->throw();
		
		assert($response instanceof OriginInstallationCancelMutationResponse);
		
		return $response;
	}
}
