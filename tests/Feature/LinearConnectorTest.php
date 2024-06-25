<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\Inputs\IssueCreateInput;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Tests\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class LinearConnectorTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();
		
		MockClient::destroyGlobal();
	}
	
	public function test_it_can_fetch_issues(): void
	{
		MockClient::global([
			LinearRequest::class => MockResponse::fixture(__FUNCTION__),
		]);
		
		$issues = app(LinearConnector::class)
			->issues()
			->get('*');
		
		dd($issues);
	}
	
	public function test_it_can_create_an_issue(): void
	{
		$team = linear()
			->teams()
			->get('nodes.id', 'nodes.name')
			->first();
		
		$result = app(LinearConnector::class)
			->issueCreateMutation(new IssueCreateInput(
				teamId: $team->id,
				title: 'Issue created via new SDK at '.now()->toFormattedDayDateString(),
			))
			->get('success', 'issue.id', 'issue.number', 'issue.title');
		
		dd($result);
	}
}
