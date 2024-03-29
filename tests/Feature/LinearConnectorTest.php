<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\Inputs\IssueCreateInput;
use Glhd\Linearavel\Tests\TestCase;

class LinearConnectorTest extends TestCase
{
	public function test_it_can_fetch_issues(): void
	{
		$issues = app(LinearConnector::class)
			->issues()
			->get('nodes.id', 'nodes.title')
			->resolve();
		
		dd($issues);
	}
	
	public function test_it_can_create_an_issue(): void
	{
		$team = linear()
			->teams()
			->get('nodes.id', 'nodes.name')
			->resolve()
			->first();
		
		$result = app(LinearConnector::class)
			->issueCreateMutation(new IssueCreateInput(
				teamId: $team->id,
				title: 'Issue created via Linearavel',
			))
			->get('success', 'issue.id', 'issue.number', 'issue.title');
		
		dd($result->resolve());
	}
}
