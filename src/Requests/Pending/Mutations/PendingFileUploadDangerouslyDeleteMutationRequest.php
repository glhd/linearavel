<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\FileUploadDeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\FileUploadDangerouslyDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingFileUploadDangerouslyDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['assetUrl' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'fileUploadDangerouslyDelete', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): FileUploadDeletePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): FileUploadDangerouslyDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FileUploadDangerouslyDeleteMutationResponse::class, $query))->throw();
		
		assert($response instanceof FileUploadDangerouslyDeleteMutationResponse);
		
		return $response;
	}
}
