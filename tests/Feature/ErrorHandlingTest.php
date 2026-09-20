<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Exceptions\LinearRequestException;
use Glhd\Linearavel\Tests\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class ErrorHandlingTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();
		
		MockClient::destroyGlobal();
	}
	
	public function test_it_throws_when_linear_returns_graphql_errors(): void
	{
		// Linear sends GraphQL errors back with a 200 status code
		MockClient::global([
			MockResponse::make([
				'errors' => [
					[
						'message' => 'Entity not found',
						'extensions' => [
							'code' => 'FEATURE_NOT_ACCESSIBLE',
							'userPresentableMessage' => 'That issue does not exist.',
						],
					],
				],
			], 200),
		]);
		
		try {
			app(LinearConnector::class)->issue('missing')->get();
			$this->fail('Expected a LinearRequestException to be thrown.');
		} catch (LinearRequestException $exception) {
			$this->assertStringContainsString('Entity not found', $exception->getMessage());
			$this->assertSame(['That issue does not exist.'], $exception->messages()->all());
			$this->assertSame(['FEATURE_NOT_ACCESSIBLE'], $exception->codes()->all());
			$this->assertCount(1, $exception->errors());
		}
	}
	
	public function test_it_falls_back_to_the_raw_message_when_there_is_no_presentable_one(): void
	{
		MockClient::global([
			MockResponse::make(['errors' => [['message' => 'Something broke']]], 200),
		]);
		
		try {
			app(LinearConnector::class)->issue('missing')->get();
			$this->fail('Expected a LinearRequestException to be thrown.');
		} catch (LinearRequestException $exception) {
			$this->assertSame(['Something broke'], $exception->messages()->all());
		}
	}
	
	public function test_it_still_throws_on_http_errors(): void
	{
		MockClient::global([MockResponse::make(['message' => 'Nope'], 401)]);
		
		$this->expectException(\Saloon\Exceptions\Request\RequestException::class);
		
		app(LinearConnector::class)->issue('missing')->get();
	}
	
	public function test_it_does_not_throw_when_there_are_no_errors(): void
	{
		MockClient::global([
			MockResponse::make(['data' => ['issue' => ['id' => 'abc', 'title' => 'Fine']]], 200),
		]);
		
		$issue = app(LinearConnector::class)->issue('abc')->get('id', 'title');
		
		$this->assertSame('abc', $issue->id);
		$this->assertSame('Fine', $issue->title);
	}
}
