<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Illuminate\Support\Collection;
use PhpParser\Builder\Namespace_;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Scalar\String_;

class PhpStormMetaWriter
{
	public function __construct(
		public Collection $meta = new Collection(),
	) {
	}
	
	public function register(string $class, array $arguments = []): self
	{
		$this->meta[$class] = $arguments;
		
		return $this;
	}
	
	public function write(): bool
	{
		$ns = (new Namespace_('PHPSTORM_META'));
		
		foreach ($this->meta as $class => $arguments) {
			$ns->addStmt(new FuncCall(
				name: new Name('expectedArguments'),
				args: [
					new Arg(new StaticCall(new Name\FullyQualified($class), 'get')),
					new Arg(new Int_(0)),
					new Arg(new String_('*')),
					...array_map(fn($arg) => new String_($arg), $arguments),
				],
			));
		}
		
		$ns = $ns->getNode();
		$ns->setAttribute('kind', 2); // Namespace block
		
		return app(WriteQueue::class)
			->add(new PendingFile(Finder::basePath('../.phpstorm.meta.php'), [$ns]))
			->save();
	}
}
