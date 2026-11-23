<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentUpdateGeneralAccessMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentUpdateGeneralAccessMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['removeCollaboratorIds' => '[String!]', 'previousGeneralAccess' => 'String', 'applyToSubDocuments' => 'Boolean', 'generalAccess' => 'String!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentUpdateGeneralAccess', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentUpdateGeneralAccessMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentUpdateGeneralAccessMutationResponse::class, $query))->throw();
		
		assert($response instanceof DocumentUpdateGeneralAccessMutationResponse);
		
		return $response;
	}
}
