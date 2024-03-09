<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Support\KeyHelper;
use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\Parser;
use Illuminate\Support\Arr;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;
use RuntimeException;
use Spatie\LaravelData\Data;

class MetaGenerator
{
	public function __construct(
		protected string $root,
	) {
	}
	
	public function generate()
	{
		$keys = app(KeyHelper::class)
			->get($this->root)
			->map(fn($key) => var_export($key, true))
			->implode(', ');
		
		// dd($keys);
	}
}
