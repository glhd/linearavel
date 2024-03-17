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
			arguments: ['includeArchived' => false],
			alias: 'MyQuery',
		);
		
		echo (string) $builder;
	}
}
