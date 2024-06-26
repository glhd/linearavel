<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UsersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUsersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.name',
		'nodes.displayName',
		'nodes.email',
		'nodes.inviteHash',
		'nodes.guest',
		'nodes.active',
		'nodes.url',
		'nodes.createdIssueCount',
		'nodes.isMe',
		'nodes.admin',
		'nodes.archivedAt',
		'nodes.avatarUrl',
		'nodes.disableReason',
		'nodes.calendarHash',
		'nodes.description',
		'nodes.statusEmoji',
		'nodes.statusLabel',
		'nodes.statusUntilAt',
		'nodes.timezone',
		'nodes.lastSeen',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'users', $args));
	}
	
	public function get(string ...$fields): UserConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UsersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UsersQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof UsersQueryResponse);
		
		return $response;
	}
}
