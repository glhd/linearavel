<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entityId'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentDelete', $args));
	}
	
	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentDeleteMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentDeleteMutationResponse);
		
		return $response;
	}
}
