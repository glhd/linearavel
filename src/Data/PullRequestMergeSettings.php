<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\PullRequestMergeMethod;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestMergeSettings */
class PullRequestMergeSettings extends Data
{
	public function __construct(public Optional|bool $isMergeQueueEnabled, public Optional|bool $squashMergeAllowed, public Optional|bool $autoMergeAllowed, public Optional|bool $rebaseMergeAllowed, public Optional|bool $mergeCommitAllowed, public Optional|bool $deleteBranchOnMerge, public Optional|PullRequestMergeMethod|null $mergeQueueMergeMethod)
	{
	}
}
