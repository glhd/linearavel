<?php

namespace Glhd\Linearavel\Tests\Fixtures;

class TeamsFixture extends Fixture
{
	protected function defineName(): string
	{
		return 'teams';
	}
	
	protected function defineSensitiveJsonParameters(): array
	{
		return ['inviteHash' => 'redacted'];
	}
}
