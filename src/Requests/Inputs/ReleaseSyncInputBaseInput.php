<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseSyncInputBase */
class ReleaseSyncInputBaseInput
{
	public function __construct(
		public string $commitSha,
		public ?string $name = null,
		public ?string $description = null,
		public ?string $version = null,
		public ?bool $preserveStoredCommitSha = null,
		/** @var iterable<IssueReferenceInput>|Collection<int, IssueReferenceInput> */
		public ?iterable $issueReferences = null,
		/** @var iterable<IssueReferenceInput>|Collection<int, IssueReferenceInput> */
		public ?iterable $revertedIssueReferences = null,
		/** @var iterable<PullRequestReferenceInput>|Collection<int, PullRequestReferenceInput> */
		public ?iterable $pullRequestReferences = null,
		public ?RepositoryDataInput $repository = null,
		public ?ReleaseDebugSinkInput $debugSink = null,
		/** @var iterable<ReleaseLinkInput>|Collection<int, ReleaseLinkInput> */
		public ?iterable $links = null,
		/** @var iterable<ReleaseDocumentInput>|Collection<int, ReleaseDocumentInput> */
		public ?iterable $documents = null,
		public ?ReleaseNoteInput $releaseNotes = null
	) {
	}
}
