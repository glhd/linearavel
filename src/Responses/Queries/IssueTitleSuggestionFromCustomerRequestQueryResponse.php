<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueTitleSuggestionFromCustomerRequestPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueTitleSuggestionFromCustomerRequestQueryResponse extends LinearResponse
{
	public function resolve(): IssueTitleSuggestionFromCustomerRequestPayload
	{
		return IssueTitleSuggestionFromCustomerRequestPayload::from($this->json('data.issueTitleSuggestionFromCustomerRequest'));
	}
}
