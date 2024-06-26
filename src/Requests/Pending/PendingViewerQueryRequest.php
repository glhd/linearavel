<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\User;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ViewerQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingViewerQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'name',
		'displayName',
		'email',
		'inviteHash',
		'guest',
		'active',
		'url',
		'createdIssueCount',
		'isMe',
		'admin',
		'archivedAt',
		'avatarUrl',
		'disableReason',
		'calendarHash',
		'description',
		'statusEmoji',
		'statusLabel',
		'statusUntilAt',
		'timezone',
		'lastSeen',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'viewer', $args));
	}
	
	public function get(string ...$fields): User
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ViewerQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ViewerQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ViewerQueryResponse);
		
		return $response;
	}
}
