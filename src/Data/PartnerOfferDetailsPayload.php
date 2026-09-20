<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\PartnerDiscountType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PartnerOfferDetailsPayload */
class PartnerOfferDetailsPayload extends Data
{
	public function __construct(public Optional|string $id, public Optional|string $partnerSlug, public Optional|string $partnerName, public Optional|string $token, public Optional|PartnerDiscountType $discountType, public Optional|int $discountValue, public Optional|int|null $durationMonths)
	{
	}
}
