<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\CodeGeneration\DocBlock;
use Glhd\Linearavel\Tests\TestCase;

class DocBlockTest extends TestCase
{
	public function test_it_generates_single_line_docblocks_when_appropriate(): void
	{
		$docblock = DocBlock::make()->see('https://www.cmorrell.com');
		
		$this->assertEquals('/** @see https://www.cmorrell.com */', (string) $docblock);
	}
	
	public function test_it_generates_multi_line_docblocks_when_appropriate(): void
	{
		$docblock = DocBlock::make()
			->see('https://www.cmorrell.com')
			->extends('Collection', 'Foo');
		
		$expected = <<<'DOCBLOCK'
		/**
		 * @see https://www.cmorrell.com
		 * @extends Collection<Foo>
		 */
		DOCBLOCK;
		
		$this->assertEquals($expected, (string) $docblock);
	}
}
