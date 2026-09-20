<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UsersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUsersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.displayName', 'nodes.email', 'nodes.inviteHash', 'nodes.guest', 'nodes.active', 'nodes.url', 'nodes.createdIssueCount', 'nodes.isMe', 'nodes.admin', 'nodes.archivedAt', 'nodes.avatarUrl', 'nodes.disableReason', 'nodes.calendarHash', 'nodes.description', 'nodes.statusEmoji', 'nodes.statusLabel', 'nodes.statusUntilAt', 'nodes.timezone', 'nodes.lastSeen'];

	protected const ARGUMENT_TYPES = ['filter' => 'UserFilter', 'includeDisabled' => 'Boolean', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'users', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UsersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UsersQueryResponse::class, $query))->throw();
		
		assert($response instanceof UsersQueryResponse);
		
		return $response;
	}
}
