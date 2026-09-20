<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AccessKeyReleasePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseCompleteByAccessKeyMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseCompleteByAccessKeyMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseCompleteInputBase!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseCompleteByAccessKey', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AccessKeyReleasePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseCompleteByAccessKeyMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseCompleteByAccessKeyMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseCompleteByAccessKeyMutationResponse);
		
		return $response;
	}
}
