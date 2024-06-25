<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use Illuminate\Support\Collection;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Namespace_;

class PhpStormMetaWriter
{
	public function __construct(
		public Collection $meta = new Collection(),
	) {
	}
	
	public function register(string $class, array $arguments = []) : self
	{
		return $this;
	}
}
