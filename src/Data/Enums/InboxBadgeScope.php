<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/InboxBadgeScope */
enum InboxBadgeScope: string
{
	case all = 'all';
	case priority = 'priority';
	case none = 'none';
}
