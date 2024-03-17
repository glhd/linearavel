<?php

namespace Glhd\Linearavel\Requests\Inputs;

class InitiativeToProjectUpdateInput
{
	function __construct(public ?float $sortOrder = null)
	{
	}
}
