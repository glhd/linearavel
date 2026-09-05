<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'DocumentUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof DocumentUpdateMutationResponse);
		
		return $response;
	}
}
