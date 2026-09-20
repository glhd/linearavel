<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\User;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ViewerQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingViewerQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'displayName', 'email', 'initials', 'avatarBackgroundColor', 'guest', 'app', 'active', 'url', 'createdIssueCount', 'canAccessAnyPublicTeam', 'isMe', 'admin', 'owner', 'isAssignable', 'isMentionable', 'supportsAgentSessions', 'inviteHash', 'hasGitHubCodeAccess', 'archivedAt', 'avatarUrl', 'disableReason', 'calendarHash', 'description', 'title', 'statusEmoji', 'statusLabel', 'statusUntilAt', 'timezone', 'lastSeen', 'gitHubUserId'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'viewer', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): User
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ViewerQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ViewerQueryResponse::class, $query))->throw();
		
		assert($response instanceof ViewerQueryResponse);
		
		return $response;
	}
}
