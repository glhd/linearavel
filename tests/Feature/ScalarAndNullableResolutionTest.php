<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Tests\Fixtures\ScalarQueryResponse;
use Glhd\Linearavel\Tests\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

/**
 * Not every root field returns an object that is always there: some return a
 * bare scalar, and some can come back null.
 */
class ScalarAndNullableResolutionTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();

		MockClient::destroyGlobal();
	}

	public function test_a_response_can_resolve_to_a_scalar(): void
	{
		MockClient::global([
			MockResponse::make(['data' => ['scalar' => 'ssh://sandbox.linear.app']], 200),
		]);

		$this->assertSame('ssh://sandbox.linear.app', $this->sendScalarQuery()->resolve());
	}

	public function test_a_scalar_response_can_resolve_to_null(): void
	{
		MockClient::global([
			MockResponse::make(['data' => ['scalar' => null]], 200),
		]);

		$this->assertNull($this->sendScalarQuery()->resolve());
	}

	public function test_a_scalar_query_is_sent_without_a_selection_set(): void
	{
		$builder = new GraphQueryBuilder(
			type: 'query',
			name: 'agentSessionSshAddress',
			arguments: ['id' => 'abc'],
		);

		$expected = <<<'GQL'
		query {
			agentSessionSshAddress(id: "abc")
		}
		GQL;

		$this->assertSame($expected, (string) $builder);
	}

	public function test_a_nullable_query_resolves_to_null_rather_than_hydrating(): void
	{
		MockClient::global([
			MockResponse::make(['data' => ['issueVcsBranchSearch' => null]], 200),
		]);

		$this->assertNull(app(LinearConnector::class)->issueVcsBranchSearch('nope')->get());
	}

	public function test_a_nullable_query_still_hydrates_when_the_field_is_present(): void
	{
		MockClient::global([
			MockResponse::make([
				'data' => [
					'issueVcsBranchSearch' => [
						'id' => 'issue-id',
						'title' => 'Fix the thing',
					],
				],
			], 200),
		]);

		$issue = app(LinearConnector::class)->issueVcsBranchSearch('chris/fix-the-thing')->get();

		$this->assertInstanceOf(Issue::class, $issue);
		$this->assertSame('Fix the thing', $issue->title);
	}

	protected function sendScalarQuery(): ScalarQueryResponse
	{
		$response = app(LinearConnector::class)
			->send(new LinearRequest(ScalarQueryResponse::class, 'query { scalar }'))
			->throw();

		$this->assertInstanceOf(ScalarQueryResponse::class, $response);

		return $response;
	}
}
