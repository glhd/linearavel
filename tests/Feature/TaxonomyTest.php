<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\CodeGeneration\Taxonomy;
use Glhd\Linearavel\Tests\TestCase;

class TaxonomyTest extends TestCase
{
	public function test_it_can_generate_names_for_queries(): void
	{
		$taxonomy = new Taxonomy('FooBar', 'Query');
		
		$this->assertEquals('Glhd\\Linearavel\\Responses\\Queries\\FooBarQueryResponse', (string) $taxonomy->response());
		$this->assertEquals('Glhd\\Linearavel\\Requests\\Pending\\Queries\\PendingFooBarQueryRequest', (string) $taxonomy->pendingRequest());
	}
	
	public function test_it_can_generate_names_for_mutations(): void
	{
		$taxonomy = new Taxonomy('FooBar', 'Mutation');
		
		$this->assertEquals('Glhd\\Linearavel\\Responses\\Mutations\\FooBarMutationResponse', (string) $taxonomy->response());
		$this->assertEquals('Glhd\\Linearavel\\Requests\\Pending\\Mutations\\PendingFooBarMutationRequest', (string) $taxonomy->pendingRequest());
	}
}
