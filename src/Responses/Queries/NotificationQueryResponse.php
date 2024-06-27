<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Contracts\SkipsCodeGeneration;
use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\IssueNotification;
use Glhd\Linearavel\Data\OauthClientApprovalNotification;
use Glhd\Linearavel\Data\ProjectNotification;
use Glhd\Linearavel\Responses\LinearResponse;
use RuntimeException;

class NotificationQueryResponse extends LinearResponse implements SkipsCodeGeneration
{
	public function resolve(): IssueNotification|ProjectNotification|OauthClientApprovalNotification
	{
		// return Notification::from($this->json('data.notification'));
		throw new RuntimeException('Not yet implemented.');
	}
}
