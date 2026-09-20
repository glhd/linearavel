<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\GitHubEnterpriseServerInstallVerificationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class VerifyGitHubEnterpriseServerInstallationQueryResponse extends LinearResponse
{
	public function resolve(): GitHubEnterpriseServerInstallVerificationPayload
	{
		return GitHubEnterpriseServerInstallVerificationPayload::from($this->json('data.verifyGitHubEnterpriseServerInstallation'));
	}
}
