<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/OAuthClientApprovalStatus */
enum OAuthClientApprovalStatus: string
{
	case requested = 'requested';
	case approved = 'approved';
	case denied = 'denied';
}
