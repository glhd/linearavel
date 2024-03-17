<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GithubOrg extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $login,
		/** @var Collection<int, GithubRepo> */
		public Optional|Collection $repositories,
		public Optional|bool|null $isPersonal = null
	) {
	}
}
