<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableIssueFilter
{
	public function __construct(
		/** @var Collection<int, NullableIssueFilter> */
		public Collection $and,
		/** @var Collection<int, NullableIssueFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?NumberComparator $number = null,
		public ?StringComparator $title = null,
		public ?NullableStringComparator $description = null,
		public ?NullableNumberComparator $priority = null,
		public ?EstimateComparator $estimate = null,
		public ?NullableDateComparator $startedAt = null,
		public ?NullableDateComparator $triagedAt = null,
		public ?NullableDateComparator $completedAt = null,
		public ?NullableDateComparator $canceledAt = null,
		public ?NullableDateComparator $autoClosedAt = null,
		public ?NullableDateComparator $autoArchivedAt = null,
		public ?NullableTimelessDateComparator $dueDate = null,
		public ?NullableDateComparator $snoozedUntilAt = null,
		public ?NullableUserFilter $assignee = null,
		public ?NullableTemplateFilter $lastAppliedTemplate = null,
		public ?SourceMetadataComparator $sourceMetadata = null,
		public ?NullableUserFilter $creator = null,
		public ?NullableIssueFilter $parent = null,
		public ?NullableUserFilter $snoozedBy = null,
		public ?IssueLabelCollectionFilter $labels = null,
		public ?UserCollectionFilter $subscribers = null,
		public ?TeamFilter $team = null,
		public ?NullableProjectMilestoneFilter $projectMilestone = null,
		public ?CommentCollectionFilter $comments = null,
		public ?NullableCycleFilter $cycle = null,
		public ?NullableProjectFilter $project = null,
		public ?WorkflowStateFilter $state = null,
		public ?IssueCollectionFilter $children = null,
		public ?AttachmentCollectionFilter $attachments = null,
		public ?ContentComparator $searchableContent = null,
		public ?RelationExistsComparator $hasRelatedRelations = null,
		public ?RelationExistsComparator $hasDuplicateRelations = null,
		public ?RelationExistsComparator $hasBlockedByRelations = null,
		public ?RelationExistsComparator $hasBlockingRelations = null,
		public ?SlaStatusComparator $slaStatus = null,
		public ?bool $null = null
	) {
	}
}
