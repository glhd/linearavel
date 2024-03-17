<?php

namespace Glhd\Linearavel\Requests\Inputs;

class DocumentUpdateInput
{
	function __construct(
		public ?string $title = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?string $contentData = null,
		public ?string $content = null,
		public ?string $projectId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?float $sortOrder = null
	) {
	}
}
