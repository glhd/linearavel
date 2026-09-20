<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitHubEnterpriseServerInstallVerificationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\VerifyGitHubEnterpriseServerInstallationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingVerifyGitHubEnterpriseServerInstallationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['integrationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'verifyGitHubEnterpriseServerInstallation', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GitHubEnterpriseServerInstallVerificationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): VerifyGitHubEnterpriseServerInstallationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(VerifyGitHubEnterpriseServerInstallationQueryResponse::class, $query))->throw();
		
		assert($response instanceof VerifyGitHubEnterpriseServerInstallationQueryResponse);
		
		return $response;
	}
}
