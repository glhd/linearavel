<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\DependencyEcosystem;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/DependencyPackageInput */
class DependencyPackageInput
{
	public function __construct(public DependencyEcosystem $ecosystem, public string $name, public string $version)
	{
	}
}
