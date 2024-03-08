<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\Client;
use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use Glhd\Linearavel\Tests\TestCase;
use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\Parser;
use PhpParser\Node\Stmt\Class_;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

enum Foo: string
{
	case bar = 'bar';
}

class ClientTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		dd(app(Client::class)->teams());
	}
	
	public function test_transformer(): void
	{
		$transformer = new Transformer(__DIR__.'/../../local.graphql', 'Glhd\\Linearavel\\');
		echo $transformer->transform();
	}
}
