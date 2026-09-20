<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\UserSettingsThemePreset;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/UserSettingsTheme */
class UserSettingsTheme extends Data
{
	public function __construct(public Optional|UserSettingsThemePreset $preset, public Optional|UserSettingsCustomTheme|null $custom)
	{
	}
}
