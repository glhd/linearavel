<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseNote;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleaseNoteQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseNoteQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'slugId', 'releaseCount', 'url', 'archivedAt', 'title', 'generationStatus'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releaseNote', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseNote
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseNoteQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseNoteQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseNoteQueryResponse);
		
		return $response;
	}
}
