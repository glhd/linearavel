<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentDelete', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentDeleteMutationResponse::class, $query))->throw();
		
		assert($response instanceof DocumentDeleteMutationResponse);
		
		return $response;
	}
}
