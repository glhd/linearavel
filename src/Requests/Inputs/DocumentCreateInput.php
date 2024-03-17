<?php

namespace Glhd\Linearavel\Requests\Inputs;

class DocumentCreateInput
{
	public function __construct(
		public string $title,
		public string $projectId,
		public ?string $id = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?string $contentData = null,
		public ?string $content = null,
		public ?string $lastAppliedTemplateId = null,
		public ?float $sortOrder = null
	) {
	}
}
