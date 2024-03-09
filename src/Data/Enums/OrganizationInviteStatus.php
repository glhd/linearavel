<?php

namespace Glhd\Linearavel\Enums;

enum OrganizationInviteStatus: string
{
	case pending = 'pending';
	case accepted = 'accepted';
	case expired = 'expired';
}
