<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailUserAccountAuthChallengeResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailUserAccountAuthChallengeMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailUserAccountAuthChallengeMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'authType'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailUserAccountAuthChallenge', $args));
	}
	
	public function get(string ...$fields): EmailUserAccountAuthChallengeResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmailUserAccountAuthChallengeMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailUserAccountAuthChallengeMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmailUserAccountAuthChallengeMutationResponse);
		
		return $response;
	}
}
