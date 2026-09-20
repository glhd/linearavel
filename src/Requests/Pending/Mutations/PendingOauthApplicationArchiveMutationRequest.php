<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplicationArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OauthApplicationArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'oauthApplicationArchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplicationArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationArchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationArchiveMutationResponse);
		
		return $response;
	}
}
