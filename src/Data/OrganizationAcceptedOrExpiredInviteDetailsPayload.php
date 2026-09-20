<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Data\Enums\OrganizationInviteStatus;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationAcceptedOrExpiredInviteDetailsPayload */
class OrganizationAcceptedOrExpiredInviteDetailsPayload extends Data implements OrganizationInviteDetailsPayload
{
	public function __construct(public Optional|OrganizationInviteStatus $status)
	{
	}
}
