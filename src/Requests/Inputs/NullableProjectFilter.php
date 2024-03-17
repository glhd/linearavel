<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableProjectFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?StringComparator $state = null,
		public ?ProjectStatusFilter $status = null,
		public ?ContentComparator $searchableContent = null,
		public ?NullableDateComparator $completedAt = null,
		public ?NullableDateComparator $pausedAt = null,
		public ?NullableDateComparator $startDate = null,
		public ?NullableDateComparator $targetDate = null,
		public ?StringComparator $health = null,
		public ?UserFilter $creator = null,
		public ?NullableUserFilter $lead = null,
		public ?UserFilter $members = null,
		public ?IssueCollectionFilter $issues = null,
		public ?RoadmapCollectionFilter $roadmaps = null,
		public ?InitiativeCollectionFilter $initiatives = null,
		public ?ProjectMilestoneCollectionFilter $projectMilestones = null,
		public ?ProjectMilestoneCollectionFilter $completedProjectMilestones = null,
		public ?ProjectMilestoneFilter $nextProjectMilestone = null,
		public ?TeamCollectionFilter $accessibleTeams = null,
		public ?NullableTemplateFilter $lastAppliedTemplate = null,
		public ?bool $null = null,
		/** @var iterable<NullableProjectFilter>|Collection<int, NullableProjectFilter> */
		public ?iterable $and = null,
		/** @var iterable<NullableProjectFilter>|Collection<int, NullableProjectFilter> */
		public ?iterable $or = null
	) {
	}
}
