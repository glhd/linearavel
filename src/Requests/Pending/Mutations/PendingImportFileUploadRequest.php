<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UploadPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ImportFileUploadResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingImportFileUploadRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'importFileUpload', $args));
	}
	
	public function get(string ...$fields): UploadPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ImportFileUploadResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ImportFileUploadResponse::class, (string) $query))->throw();
		
		assert($response instanceof ImportFileUploadResponse);
		
		return $response;
	}
}
