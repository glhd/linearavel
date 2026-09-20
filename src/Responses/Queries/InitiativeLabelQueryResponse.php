<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeLabel;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeLabelQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeLabel
	{
		return InitiativeLabel::from($this->json('data.initiativeLabel'));
	}
}
