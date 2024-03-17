<?php

namespace Glhd\Linearavel\Requests\Inputs;

class InitiativeToProjectUpdateInput
{
	public function __construct(public ?float $sortOrder = null)
	{
	}
}
