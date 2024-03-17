<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserAuthorizedApplication extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		public Optional|bool $isAuthorized,
		public Optional|bool $createdByLinear,
		public Optional|bool $webhooksEnabled,
		public Optional|string|null $description,
		public Optional|string|null $imageUrl,
		public Optional|string|null $approvalErrorCode
	) {
	}
}
