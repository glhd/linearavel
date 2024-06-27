<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SendStrategy */
enum SendStrategy: string
{
	case desktopThenPush = 'desktopThenPush';
	case desktopAndPush = 'desktopAndPush';
	case desktop = 'desktop';
	case push = 'push';
}
