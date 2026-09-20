<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/UsageAlertType */
enum UsageAlertType: string
{
	case lowBalance = 'lowBalance';
	case exhausted = 'exhausted';
	case expiringPromoCredit = 'expiringPromoCredit';
}
