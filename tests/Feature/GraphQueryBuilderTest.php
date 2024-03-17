<?php

namespace Glhd\Linearavel\Tests\Feature;

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
}
