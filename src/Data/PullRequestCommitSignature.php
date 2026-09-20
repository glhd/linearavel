<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestCommitSignature */
class PullRequestCommitSignature extends Data
{
	public function __construct(public Optional|string $type, public Optional|bool $isVerified, public Optional|string $state, public Optional|bool|null $wasSignedByProvider, public Optional|string|null $keyId, public Optional|string|null $keyFingerprint)
	{
	}
}
