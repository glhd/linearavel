<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ArchivedIntegrationPayload */
class ArchivedIntegrationPayload extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $service,
		#[LinearDate]
		public Optional|CarbonImmutable $archivedAt,
		public Optional|string|null $orgLogin,
		public Optional|string|null $externalOrgId,
		public Optional|string|null $orgAvatarUrl,
		public Optional|string|null $enterpriseUrl,
		public Optional|bool|null $codeAccess
	) {
	}
}
