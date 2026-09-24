<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitLabSettingsInput */
class GitLabSettingsInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $scopes = null,
		public ?bool $canSelfRotate = null,
		public ?bool $rotationEnabled = null,
		public ?string $nextRotationAt = null,
		public ?string $lastRotatedAt = null,
		public ?string $rotationFailureReason = null,
		public ?string $url = null,
		public ?bool $readonly = null,
		public ?string $expiresAt = null,
		public ?string $validationProjectPath = null,
		public ?bool $useRestPrSync = null
	) {
	}
}
