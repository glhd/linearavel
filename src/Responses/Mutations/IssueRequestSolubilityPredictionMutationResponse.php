<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\SuccessPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueRequestSolubilityPredictionMutationResponse extends LinearResponse
{
	public function resolve(): SuccessPayload
	{
		return SuccessPayload::from($this->json('data.issueRequestSolubilityPrediction'));
	}
}
