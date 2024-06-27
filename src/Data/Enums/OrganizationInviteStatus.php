<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/OrganizationInviteStatus */
enum OrganizationInviteStatus: string
{
	case pending = 'pending';
	case accepted = 'accepted';
	case expired = 'expired';
}
