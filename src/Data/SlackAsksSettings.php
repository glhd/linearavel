<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SlackAsksSettings */
class SlackAsksSettings extends Data
{
	public function __construct(
		public Optional|UserRoleType $canAdministrate,
		public Optional|string|null $teamName,
		public Optional|string|null $teamId,
		/** @var Collection<int, SlackChannelNameMapping> */
		public Optional|Collection|null $slackChannelMapping
	) {
	}
}
