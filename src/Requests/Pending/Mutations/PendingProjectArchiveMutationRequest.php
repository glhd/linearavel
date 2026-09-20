<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['trash' => 'Boolean', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectArchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectArchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectArchiveMutationResponse);
		
		return $response;
	}
}
