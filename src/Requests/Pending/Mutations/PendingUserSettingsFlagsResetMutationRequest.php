<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsFlagsResetPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserSettingsFlagsResetMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsFlagsResetMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['flags' => '[UserFlagType!]'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userSettingsFlagsReset', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserSettingsFlagsResetPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserSettingsFlagsResetMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsFlagsResetMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserSettingsFlagsResetMutationResponse);
		
		return $response;
	}
}
