<?php

namespace Glhd\Linearavel\Enums;

enum OAuthClientApprovalStatus: string
{
	case requested = 'requested';
	case approved = 'approved';
	case denied = 'denied';
}
