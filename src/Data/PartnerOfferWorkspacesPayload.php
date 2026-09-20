<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PartnerOfferWorkspacesPayload */
class PartnerOfferWorkspacesPayload extends Data
{
	public function __construct(
		public Optional|PartnerOfferDetailsPayload $offer,
		/** @var Collection<int, PartnerOfferWorkspacePayload> */
		public Optional|Collection $workspaces
	) {
	}
}
