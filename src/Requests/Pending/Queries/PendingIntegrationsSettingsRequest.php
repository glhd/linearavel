<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationsSettings;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationsSettingsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationsSettingsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'archivedAt',
		'slackIssueCreated',
		'slackIssueNewComment',
		'slackIssueStatusChangedDone',
		'slackIssueStatusChangedAll',
		'slackProjectUpdateCreated',
		'slackProjectUpdateCreatedToTeam',
		'slackProjectUpdateCreatedToWorkspace',
		'slackIssueAddedToTriage',
		'slackIssueSlaHighRisk',
		'slackIssueSlaBreached',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationsSettings', $args));
	}
	
	public function get(string ...$fields): IntegrationsSettings
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationsSettingsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationsSettingsResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationsSettingsResponse);
		
		return $response;
	}
}
