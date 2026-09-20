<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/UserSettingsCustomTheme */
class UserSettingsCustomTheme extends Data
{
	public function __construct(
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $accent,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $base,
		public Optional|int $contrast,
		public Optional|UserSettingsCustomSidebarTheme|null $sidebar
	) {
	}
}
