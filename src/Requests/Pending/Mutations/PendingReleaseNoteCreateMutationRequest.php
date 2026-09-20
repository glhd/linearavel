<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseNotePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ReleaseNoteCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseNoteCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ReleaseNoteCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'releaseNoteCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseNotePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseNoteCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseNoteCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseNoteCreateMutationResponse);
		
		return $response;
	}
}
