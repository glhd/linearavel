<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\PartnerOfferIneligibilityReason;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PartnerOfferWorkspacePayload */
class PartnerOfferWorkspacePayload extends Data
{
	public function __construct(public Optional|string $organizationId, public Optional|bool $eligible, public Optional|PartnerOfferIneligibilityReason|null $ineligibilityReason)
	{
	}
}
