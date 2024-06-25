<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ImageUploadFromUrlPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ImageUploadFromUrlResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingImageUploadFromUrlRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'url'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'imageUploadFromUrl', $args));
	}
	
	public function get(string ...$fields): ImageUploadFromUrlPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ImageUploadFromUrlResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ImageUploadFromUrlResponse::class, (string) $query))->throw();
		
		assert($response instanceof ImageUploadFromUrlResponse);
		
		return $response;
	}
}
