<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PartnerOfferIneligibilityReason */
enum PartnerOfferIneligibilityReason: string
{
	case alreadySubscribed = 'alreadySubscribed';
	case alreadyRedeemed = 'alreadyRedeemed';
	case otherOfferPending = 'otherOfferPending';
}
