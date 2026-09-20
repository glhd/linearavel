<?php

namespace Glhd\Linearavel\Tests\Fixtures;

use Glhd\Linearavel\Responses\LinearResponse;

/**
 * Stands in for the responses we generate for root fields that return a GraphQL
 * scalar. Linear has no such field in the committed schema yet, so this keeps
 * the narrowing under test regardless of what the schema happens to hold.
 */
class ScalarQueryResponse extends LinearResponse
{
	public function resolve(): ?string
	{
		return $this->json('data.scalar');
	}
}
