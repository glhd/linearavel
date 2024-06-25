<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use Illuminate\Support\Collection;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\Int_;
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
		$this->meta[$class] = $arguments;
		
		return $this;
	}
	
	public function write(): bool
	{
		$directory = '..'; // Relative to 'src/'
		$name = '.phpstorm.meta'; // .php is automatically added
		
		$ns = (new \PhpParser\Builder\Namespace_('PHPSTORM_META'));
		
		foreach ($this->meta as $class => $arguments) {
			$ns->addStmt(new FuncCall(
				name: new Name('expectedArguments'),
				args: [
					new Arg(new StaticCall(new Name\FullyQualified($class), 'get')),
					new Arg(new Int_(0)),
					new Arg(new String_('hello world')),
					new Arg(new String_('how are you?')),
				], 
			));
		}
		
		return app(PendingTransformationQueue::class)
			->add(new PendingTransformation($directory, $name, [$ns->getNode()]))
			->save();
	}
}
