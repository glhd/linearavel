<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ImageUploadFromUrlPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ImageUploadFromUrlMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingImageUploadFromUrlMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'url'];

	protected const ARGUMENT_TYPES = ['url' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'imageUploadFromUrl', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ImageUploadFromUrlPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ImageUploadFromUrlMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ImageUploadFromUrlMutationResponse::class, $query))->throw();
		
		assert($response instanceof ImageUploadFromUrlMutationResponse);
		
		return $response;
	}
}
