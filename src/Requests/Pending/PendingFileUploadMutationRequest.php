<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UploadPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FileUploadMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFileUploadMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'fileUpload', $args));
	}
	
	public function get(string ...$fields): UploadPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FileUploadMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FileUploadMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof FileUploadMutationResponse);
		
		return $response;
	}
}
