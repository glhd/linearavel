<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PartnerOfferCategory */
enum PartnerOfferCategory: string
{
	case investor = 'investor';
	case accelerator = 'accelerator';
	case startup_community = 'startup_community';
	case creator = 'creator';
}
