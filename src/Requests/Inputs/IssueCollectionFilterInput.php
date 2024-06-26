<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?NumberComparatorInput $number = null,
		public ?StringComparatorInput $title = null,
		public ?NullableStringComparatorInput $description = null,
		public ?NullableNumberComparatorInput $priority = null,
		public ?EstimateComparatorInput $estimate = null,
		public ?NullableDateComparatorInput $startedAt = null,
		public ?NullableDateComparatorInput $triagedAt = null,
		public ?NullableDateComparatorInput $completedAt = null,
		public ?NullableDateComparatorInput $canceledAt = null,
		public ?NullableDateComparatorInput $autoClosedAt = null,
		public ?NullableDateComparatorInput $autoArchivedAt = null,
		public ?NullableTimelessDateComparatorInput $dueDate = null,
		public ?NullableDateComparatorInput $snoozedUntilAt = null,
		public ?NullableUserFilterInput $assignee = null,
		public ?NullableTemplateFilterInput $lastAppliedTemplate = null,
		public ?SourceMetadataComparatorInput $sourceMetadata = null,
		public ?NullableUserFilterInput $creator = null,
		public ?NullableIssueFilterInput $parent = null,
		public ?NullableUserFilterInput $snoozedBy = null,
		public ?IssueLabelCollectionFilterInput $labels = null,
		public ?UserCollectionFilterInput $subscribers = null,
		public ?TeamFilterInput $team = null,
		public ?NullableProjectMilestoneFilterInput $projectMilestone = null,
		public ?CommentCollectionFilterInput $comments = null,
		public ?NullableCycleFilterInput $cycle = null,
		public ?NullableProjectFilterInput $project = null,
		public ?WorkflowStateFilterInput $state = null,
		public ?IssueCollectionFilterInput $children = null,
		public ?AttachmentCollectionFilterInput $attachments = null,
		public ?ContentComparatorInput $searchableContent = null,
		public ?RelationExistsComparatorInput $hasRelatedRelations = null,
		public ?RelationExistsComparatorInput $hasDuplicateRelations = null,
		public ?RelationExistsComparatorInput $hasBlockedByRelations = null,
		public ?RelationExistsComparatorInput $hasBlockingRelations = null,
		public ?SlaStatusComparatorInput $slaStatus = null,
		/** @var iterable<IssueCollectionFilterInput>|Collection<int, IssueCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<IssueCollectionFilterInput>|Collection<int, IssueCollectionFilterInput> */
		public ?iterable $or = null,
		public ?IssueFilterInput $some = null,
		public ?IssueFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
