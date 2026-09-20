<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ViewPreferences;
use Glhd\Linearavel\Responses\LinearResponse;

class UserViewPreferencesQueryResponse extends LinearResponse
{
	public function resolve(): ?ViewPreferences
	{
		$data = $this->json('data.userViewPreferences');
		
		return null === $data ? null : ViewPreferences::from($data);
	}
}
