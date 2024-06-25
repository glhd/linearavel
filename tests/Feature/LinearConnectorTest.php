<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\Inputs\IssueCreateInput;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Tests\Fixtures\IssuesFixture;
use Glhd\Linearavel\Tests\TestCase;
use Saloon\Http\Faking\MockClient;

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
			LinearRequest::class => new IssuesFixture(),
		]);
		
		$issues = app(LinearConnector::class)
			->issues()
			->get('*');
		
		$this->assertEquals('00000000-0000-0000-0000-000000000000', $issues->first()->id);
		
		MockClient::getGlobal()->assertSent(function(LinearRequest $request) {
			$json = $request->body()->all();
			return isset($json['query'])
				&& str_contains($json['query'], 'query {')
				&& str_contains($json['query'], 'issues {')
				&& str_contains($json['query'], 'nodes {')
				&& str_contains($json['query'], 'id')
				&& str_contains($json['query'], 'createdAt')
				&& str_contains($json['query'], 'updatedAt')
				&& str_contains($json['query'], 'number')
				&& str_contains($json['query'], 'title')
				&& str_contains($json['query'], 'priority')
				&& str_contains($json['query'], 'boardOrder')
				&& str_contains($json['query'], 'sortOrder')
				&& str_contains($json['query'], 'labelIds');
		});
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
