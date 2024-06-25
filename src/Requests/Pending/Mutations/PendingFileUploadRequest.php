<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UploadPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FileUploadResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFileUploadRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'fileUpload', $args));
	}
	
	public function get(string ...$fields): UploadPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): FileUploadResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FileUploadResponse::class, (string) $query))->throw();
		
		assert($response instanceof FileUploadResponse);
		
		return $response;
	}
}
