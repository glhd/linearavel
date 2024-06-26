<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Organization;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'name',
		'urlKey',
		'periodUploadVolume',
		'gitLinkbackMessagesEnabled',
		'gitPublicLinkbackMessagesEnabled',
		'roadmapEnabled',
		'projectUpdatesReminderFrequency',
		'projectUpdateRemindersDay',
		'projectUpdateRemindersHour',
		'fiscalYearStartMonth',
		'samlEnabled',
		'scimEnabled',
		'allowedAuthServices',
		'previousUrlKeys',
		'releaseChannel',
		'slaDayCount',
		'userCount',
		'createdIssueCount',
		'archivedAt',
		'logoUrl',
		'gitBranchFormat',
		'samlSettings',
		'deletionRequestedAt',
		'trialEndsAt',
		'allowMembersToInvite',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organization', $args));
	}
	
	public function get(string ...$fields): Organization
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationQueryResponse);
		
		return $response;
	}
}
