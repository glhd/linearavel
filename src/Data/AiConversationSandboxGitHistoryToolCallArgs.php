<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationSandboxGitHistoryToolCallArgsOperation;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationSandboxGitHistoryToolCallArgs */
class AiConversationSandboxGitHistoryToolCallArgs extends Data
{
	public function __construct(
		public Optional|AiConversationSandboxGitHistoryToolCallArgsOperation $operation,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $paths
	) {
	}
}
