<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ViewPreferencesPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ViewPreferencesCreateResponse extends LinearResponse
{
	public function resolve(): ViewPreferencesPayload
	{
		return ViewPreferencesPayload::from($this->json('data.viewPreferencesCreate'));
	}
}
