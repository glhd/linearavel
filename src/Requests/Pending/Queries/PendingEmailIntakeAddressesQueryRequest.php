<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailIntakeAddressConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\EmailIntakeAddressesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailIntakeAddressesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.address', 'nodes.type', 'nodes.enabled', 'nodes.repliesEnabled', 'nodes.useUserNamesInReplies', 'nodes.customerRequestsEnabled', 'nodes.issueCreatedAutoReplyEnabled', 'nodes.issueCompletedAutoReplyEnabled', 'nodes.issueCanceledAutoReplyEnabled', 'nodes.reopenOnReply', 'nodes.emailAddress', 'nodes.archivedAt', 'nodes.forwardingEmailAddress', 'nodes.senderName', 'nodes.issueCreatedAutoReply', 'nodes.issueCompletedAutoReply', 'nodes.issueCanceledAutoReply', 'nodes.lastUsedAt'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'emailIntakeAddresses', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EmailIntakeAddressConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EmailIntakeAddressesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailIntakeAddressesQueryResponse::class, $query))->throw();
		
		assert($response instanceof EmailIntakeAddressesQueryResponse);
		
		return $response;
	}
}
