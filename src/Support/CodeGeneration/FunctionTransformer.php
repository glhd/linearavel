<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\ClassMethod;

abstract class FunctionTransformer extends InvokableTransformer
{
	use HasTypeNodes;
	use HasParent;
	
	protected ClassMethod $method;
	
	protected array $docs = [];
	
	abstract public function __invoke(PendingTransformationQueue $queue): ClassMethod;
	
	public function documentParam(string $name, string $type = '', string $description = ''): static
	{
		$this->docs[] = '@param '.trim("{$type} \${$name} {$description}");
		
		return $this;
	}
	
	public function documentReturn(string $returns): static
	{
		$this->docs[] = '@returns '.trim($returns);
		
		return $this;
	}
	
	protected function doc(): ?Doc
	{
		// FIXME: We need to account for re-ordering params
		
		if (count($this->docs)) {
			$comment = "/**\n * ".implode("\n * ", $this->docs)."\n */";
			return new Doc($comment);
		}
		
		return null;
	}
}
