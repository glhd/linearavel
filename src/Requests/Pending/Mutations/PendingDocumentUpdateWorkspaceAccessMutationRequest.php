<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentUpdateWorkspaceAccessMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentUpdateWorkspaceAccessMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['previousWorkspaceAccess' => 'String', 'applyToSubDocuments' => 'Boolean', 'workspaceAccess' => 'String!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentUpdateWorkspaceAccess', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentUpdateWorkspaceAccessMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentUpdateWorkspaceAccessMutationResponse::class, $query))->throw();
		
		assert($response instanceof DocumentUpdateWorkspaceAccessMutationResponse);
		
		return $response;
	}
}
