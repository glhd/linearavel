<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\User;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UserQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'displayName', 'email', 'initials', 'avatarBackgroundColor', 'guest', 'app', 'active', 'url', 'createdIssueCount', 'canAccessAnyPublicTeam', 'isMe', 'admin', 'owner', 'isAssignable', 'isMentionable', 'supportsAgentSessions', 'inviteHash', 'hasGitHubCodeAccess', 'archivedAt', 'avatarUrl', 'disableReason', 'calendarHash', 'description', 'title', 'statusEmoji', 'statusLabel', 'statusUntilAt', 'timezone', 'lastSeen', 'gitHubUserId'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'user', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): User
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserQueryResponse::class, $query))->throw();
		
		assert($response instanceof UserQueryResponse);
		
		return $response;
	}
}
