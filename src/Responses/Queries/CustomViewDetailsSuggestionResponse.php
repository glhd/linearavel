<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomViewSuggestionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomViewDetailsSuggestionResponse extends LinearResponse
{
	public function resolve(): CustomViewSuggestionPayload
	{
		return CustomViewSuggestionPayload::from($this->json('data.customViewDetailsSuggestion'));
	}
}
