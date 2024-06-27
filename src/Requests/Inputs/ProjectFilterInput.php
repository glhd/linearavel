<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectFilter */
class ProjectFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?StringComparatorInput $state = null,
		public ?ProjectStatusFilterInput $status = null,
		public ?ContentComparatorInput $searchableContent = null,
		public ?NullableDateComparatorInput $completedAt = null,
		public ?NullableDateComparatorInput $pausedAt = null,
		public ?NullableDateComparatorInput $startDate = null,
		public ?NullableDateComparatorInput $targetDate = null,
		public ?StringComparatorInput $health = null,
		public ?UserFilterInput $creator = null,
		public ?NullableUserFilterInput $lead = null,
		public ?UserFilterInput $members = null,
		public ?IssueCollectionFilterInput $issues = null,
		public ?RoadmapCollectionFilterInput $roadmaps = null,
		public ?InitiativeCollectionFilterInput $initiatives = null,
		public ?ProjectMilestoneCollectionFilterInput $projectMilestones = null,
		public ?ProjectMilestoneCollectionFilterInput $completedProjectMilestones = null,
		public ?ProjectMilestoneFilterInput $nextProjectMilestone = null,
		public ?TeamCollectionFilterInput $accessibleTeams = null,
		public ?NullableTemplateFilterInput $lastAppliedTemplate = null,
		/** @var iterable<ProjectFilterInput>|Collection<int, ProjectFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectFilterInput>|Collection<int, ProjectFilterInput> */
		public ?iterable $or = null
	) {
	}
}
