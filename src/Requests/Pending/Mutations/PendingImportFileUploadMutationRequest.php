<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UploadPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ImportFileUploadMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingImportFileUploadMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['metaData' => 'JSON', 'size' => 'Int!', 'contentType' => 'String!', 'filename' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'importFileUpload', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UploadPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ImportFileUploadMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ImportFileUploadMutationResponse::class, $query))->throw();
		
		assert($response instanceof ImportFileUploadMutationResponse);
		
		return $response;
	}
}
