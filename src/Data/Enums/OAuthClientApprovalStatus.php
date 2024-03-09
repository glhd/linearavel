<?php

namespace Glhd\Linearavel\Data\Enums;

enum OAuthClientApprovalStatus: string
{
	case requested = 'requested';
	case approved = 'approved';
	case denied = 'denied';
}
