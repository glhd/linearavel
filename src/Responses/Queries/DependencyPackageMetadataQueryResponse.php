<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\DependencyPackageMetadataResult;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class DependencyPackageMetadataQueryResponse extends LinearResponse
{
	/** @returns Collection<int, DependencyPackageMetadataResult> */
	public function resolve(): Collection
	{
		return DependencyPackageMetadataResult::collect($this->json('data.dependencyPackageMetadata'), Collection::class);
	}
}
