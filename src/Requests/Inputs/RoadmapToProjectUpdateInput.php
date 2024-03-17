<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RoadmapToProjectUpdateInput
{
	public function __construct(public ?float $sortOrder = null)
	{
	}
}
