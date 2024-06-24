<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class TemplatesResponse extends LinearResponse
{
	/** @returns Collection<int, Template> */
	public function resolve(): Collection
	{
		return Template::collect($this->json('data.templates'), Collection::class);
	}
}
