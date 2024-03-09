<?php

namespace Glhd\Linearavel\Enums;

enum SendStrategy: string
{
	case desktopThenPush = 'desktopThenPush';
	case desktopAndPush = 'desktopAndPush';
	case desktop = 'desktop';
	case push = 'push';
}
