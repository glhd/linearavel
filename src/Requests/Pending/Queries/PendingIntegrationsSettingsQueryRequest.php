<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationsSettings;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationsSettingsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationsSettingsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'archivedAt', 'contextViewType', 'slackIssueCreated', 'slackIssueNewComment', 'slackIssueStatusChangedDone', 'slackIssueAddedToView', 'slackIssueStatusChangedAll', 'slackProjectUpdateCreated', 'slackProjectCommentCreated', 'microsoftTeamsProjectUpdateCreated', 'slackProjectUpdateCreatedToTeam', 'slackProjectUpdateCreatedToWorkspace', 'slackInitiativeUpdateCreated', 'slackInitiativeCommentCreated', 'slackIssueAddedToTriage', 'slackIssueSlaHighRisk', 'slackIssueSlaBreached'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationsSettings', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationsSettings
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationsSettingsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationsSettingsQueryResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationsSettingsQueryResponse);
		
		return $response;
	}
}
