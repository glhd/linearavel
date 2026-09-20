<?php

namespace Glhd\Linearavel\Tests\Feature;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Enums\PaginationOrderBy;
use Glhd\Linearavel\Requests\Inputs\IssueCreateInput;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Tests\TestCase;

class GraphQueryBuilderTest extends TestCase
{
	public function test_it_can_format_a_basic_query(): void
	{
		$builder = new GraphQueryBuilder(
			type: 'query',
			name: 'teams',
			fields: ['id', 'name', 'organization.id', 'organization.name'],
			alias: 'MyQuery',
		);
		
		$expected = <<<'GQL'
		query MyQuery {
			teams {
				id
				name
				organization {
					id
					name
				}
			}
		}
		GQL;
		
		$this->assertSame($expected, (string) $builder);
	}
	
	public function test_it_can_format_a_query_with_single_arg(): void
	{
		$builder = new GraphQueryBuilder(
			type: 'query',
			name: 'teams',
			fields: ['id', 'name'],
			arguments: ['includeArchived' => true],
			alias: 'AllTeams',
		);
		
		$expected = <<<'GQL'
		query AllTeams {
			teams(includeArchived: true) {
				id
				name
			}
		}
		GQL;
		
		$this->assertSame($expected, (string) $builder);
	}
	
	public function test_it_can_format_a_query_with_multiline_args(): void
	{
		$builder = new GraphQueryBuilder(
			type: 'query',
			name: 'teams',
			fields: ['id', 'name'],
			arguments: [
				'includeArchived' => true,
				'filter' => [
					'id' => ['eq' => '12345'],
				],
			],
		);
		
		$expected = <<<'GQL'
		query {
			teams(
				includeArchived: true,
				filter: {
					id: {
						eq: "12345"
					}
				}
			) {
				id
				name
			}
		}
		GQL;
		
		$this->assertSame($expected, (string) $builder);
	}
	
	public function test_it_sends_typed_arguments_as_variables(): void
	{
		$builder = GraphQueryBuilder::make('query', 'issues', ['first' => 10], ['first' => 'Int'])
			->withFields(['nodes.id']);
		
		$expected = <<<'GQL'
		query($first: Int) {
			issues(first: $first) {
				nodes {
					id
				}
			}
		}
		GQL;
		
		$this->assertSame($expected, (string) $builder);
		$this->assertSame(['first' => 10], $builder->variables());
	}
	
	public function test_it_names_variables_in_the_alias_signature(): void
	{
		$builder = new GraphQueryBuilder(
			type: 'query',
			name: 'user',
			fields: ['id'],
			arguments: ['id' => 'abc'],
			alias: 'FindUser',
			argument_types: ['id' => 'String!'],
		);
		
		$expected = <<<'GQL'
		query FindUser($id: String!) {
			user(id: $id) {
				id
			}
		}
		GQL;
		
		$this->assertSame($expected, (string) $builder);
	}
	
	public function test_it_inlines_arguments_that_have_no_declared_type(): void
	{
		$builder = GraphQueryBuilder::make('query', 'issues', ['first' => 10, 'includeArchived' => true], ['first' => 'Int'])
			->withFields(['nodes.id']);
		
		$expected = <<<'GQL'
		query($first: Int) {
			issues(first: $first, includeArchived: true) {
				nodes {
					id
				}
			}
		}
		GQL;
		
		$this->assertSame($expected, (string) $builder);
	}
	
	public function test_it_sends_enums_as_their_backing_value(): void
	{
		$builder = GraphQueryBuilder::make(
			'query',
			'issues',
			['orderBy' => PaginationOrderBy::updatedAt],
			['orderBy' => 'PaginationOrderBy'],
		);
		
		$this->assertSame(['orderBy' => 'updatedAt'], $builder->variables());
	}
	
	public function test_it_writes_untyped_enum_arguments_as_bare_graphql_names(): void
	{
		$builder = GraphQueryBuilder::make('query', 'issues', ['orderBy' => PaginationOrderBy::updatedAt])
			->withFields(['nodes.id']);
		
		$this->assertStringContainsString('issues(orderBy: updatedAt)', (string) $builder);
	}
	
	public function test_it_sends_lists_as_json_arrays(): void
	{
		$builder = GraphQueryBuilder::make('mutation', 'issueBatchUpdate', ['ids' => ['a', 'b']], ['ids' => '[UUID!]!']);
		
		$this->assertSame(['ids' => ['a', 'b']], $builder->variables());
	}
	
	public function test_it_writes_untyped_lists_as_graphql_lists(): void
	{
		$builder = GraphQueryBuilder::make('mutation', 'issueBatchUpdate', ['ids' => ['a', 'b']])
			->withFields(['success']);
		
		$this->assertStringContainsString('issueBatchUpdate(ids: ["a", "b"])', (string) $builder);
	}
	
	public function test_it_keeps_falsy_values_in_input_objects(): void
	{
		$builder = GraphQueryBuilder::make(
			'mutation',
			'issueCreate',
			['input' => new IssueCreateInput(title: 'Test', teamId: 'abc', description: '', sortOrder: 0.0)],
			['input' => 'IssueCreateInput!'],
		);
		
		$this->assertSame([
			'input' => [
				'teamId' => 'abc',
				'title' => 'Test',
				'description' => '',
				'sortOrder' => 0.0,
			],
		], $builder->variables());
	}
	
	public function test_it_formats_dates_the_way_linear_expects(): void
	{
		$builder = GraphQueryBuilder::make(
			'query',
			'issues',
			['filter' => ['createdAt' => ['gt' => new CarbonImmutable('2024-01-01', 'UTC')]]],
			['filter' => 'IssueFilter'],
		);
		
		$this->assertSame(
			['filter' => ['createdAt' => ['gt' => '2024-01-01T00:00:00.000+00:00']]],
			$builder->variables(),
		);
	}
	
	public function test_it_omits_null_arguments_entirely(): void
	{
		$builder = GraphQueryBuilder::make(
			'query',
			'issues',
			['first' => 10, 'after' => null],
			['first' => 'Int', 'after' => 'String'],
		)->withFields(['nodes.id']);
		
		$this->assertSame(['first' => 10], $builder->variables());
		$this->assertStringNotContainsString('after', (string) $builder);
	}
}
