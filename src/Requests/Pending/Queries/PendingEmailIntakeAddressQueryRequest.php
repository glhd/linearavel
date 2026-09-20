<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\EmailIntakeAddress;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\EmailIntakeAddressQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailIntakeAddressQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'address', 'type', 'enabled', 'repliesEnabled', 'useUserNamesInReplies', 'customerRequestsEnabled', 'issueCreatedAutoReplyEnabled', 'issueCompletedAutoReplyEnabled', 'issueCanceledAutoReplyEnabled', 'reopenOnReply', 'archivedAt', 'forwardingEmailAddress', 'senderName', 'issueCreatedAutoReply', 'issueCompletedAutoReply', 'issueCanceledAutoReply', 'lastUsedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'emailIntakeAddress', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): EmailIntakeAddress
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EmailIntakeAddressQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailIntakeAddressQueryResponse::class, $query))->throw();
		
		assert($response instanceof EmailIntakeAddressQueryResponse);
		
		return $response;
	}
}
