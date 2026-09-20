<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PartnerDiscountType */
enum PartnerDiscountType: string
{
	case free_seats = 'free_seats';
	case percent_off = 'percent_off';
	case amount_off = 'amount_off';
}
