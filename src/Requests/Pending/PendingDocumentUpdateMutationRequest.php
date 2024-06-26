<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentUpdate', $args));
	}
	
	public function get(string ...$fields): DocumentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentUpdateMutationResponse);
		
		return $response;
	}
}
