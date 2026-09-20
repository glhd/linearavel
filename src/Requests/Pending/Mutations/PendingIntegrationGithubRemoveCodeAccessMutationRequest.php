<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationGithubRemoveCodeAccessPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationGithubRemoveCodeAccessMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationGithubRemoveCodeAccessMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'action'];

	protected const ARGUMENT_TYPES = ['integrationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationGithubRemoveCodeAccess', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationGithubRemoveCodeAccessPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationGithubRemoveCodeAccessMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationGithubRemoveCodeAccessMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationGithubRemoveCodeAccessMutationResponse);
		
		return $response;
	}
}
