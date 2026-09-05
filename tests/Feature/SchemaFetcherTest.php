<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\CodeGeneration\SchemaFetcher;
use Glhd\Linearavel\Tests\TestCase;
use GraphQL\GraphQL;
use GraphQL\Type\Introspection;
use GraphQL\Utils\BuildSchema;
use Illuminate\Http\Client\Factory;
use RuntimeException;

class SchemaFetcherTest extends TestCase
{
	public function test_it_turns_an_introspection_result_back_into_the_same_schema(): void
	{
		$sdl = <<<'GQL'
		type Query {
		  "Look an issue up by id."
		  issue(id: String!): Issue
		}
		
		"A unit of work."
		type Issue {
		  id: ID!
		  title: String!
		  priority: Priority
		  labelIds: [String!]!
		}
		
		enum Priority {
		  low
		  high
		}
		GQL;
		
		$fetched = (new SchemaFetcher('token', 'https://example.test/graphql', $this->respondWith($sdl)))->sdl();
		
		// Round-tripping through introspection has to be lossless, or the generated
		// code would change every time we sync
		$this->assertSame(SchemaFetcher::print(BuildSchema::build($sdl)), $fetched);
		$this->assertStringContainsString('"A unit of work."', $fetched);
		$this->assertStringContainsString('issue(id: String!): Issue', $fetched);
	}
	
	public function test_it_matches_the_schema_committed_to_this_repository(): void
	{
		$path = dirname(__DIR__, 2).'/local.graphql';
		$committed = file_get_contents($path);
		
		$fetched = (new SchemaFetcher('token', 'https://example.test/graphql', $this->respondWith($committed)))->sdl();
		
		$this->assertSame(
			SchemaFetcher::print(BuildSchema::build($committed, options: ['assumeValid' => true])),
			$fetched,
			'A sync would rewrite local.graphql even though the schema has not changed.'
		);
	}
	
	public function test_it_complains_when_introspection_returns_errors(): void
	{
		$http = new Factory();
		$http->fake(['*' => $http->response(['errors' => [['message' => 'Nope']]], 200)]);
		
		$this->expectException(RuntimeException::class);
		$this->expectExceptionMessage('Introspection returned errors');
		
		(new SchemaFetcher('token', 'https://example.test/graphql', $http))->sdl();
	}
	
	public function test_it_complains_on_a_failed_request(): void
	{
		$http = new Factory();
		$http->fake(['*' => $http->response(['message' => 'Unauthorized'], 401)]);
		
		$this->expectException(RuntimeException::class);
		$this->expectExceptionMessage('Introspection failed with status 401');
		
		(new SchemaFetcher('token', 'https://example.test/graphql', $http))->sdl();
	}
	
	protected function respondWith(string $sdl): Factory
	{
		$schema = BuildSchema::build($sdl, options: ['assumeValid' => true]);
		
		$result = GraphQL::executeQuery($schema, Introspection::getIntrospectionQuery([
			'descriptions' => true,
			'directiveIsRepeatable' => true,
			'specifiedByURL' => true,
		]))->toArray();
		
		$http = new Factory();
		$http->fake(['*' => $http->response($result, 200)]);
		
		return $http;
	}
}
