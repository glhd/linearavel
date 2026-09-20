<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/UserSettingsThemePreset */
enum UserSettingsThemePreset: string
{
	case system = 'system';
	case light = 'light';
	case pureLight = 'pureLight';
	case dark = 'dark';
	case magicBlue = 'magicBlue';
	case classicDark = 'classicDark';
	case custom = 'custom';
}
