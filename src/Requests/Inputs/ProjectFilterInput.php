<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectFilter */
class ProjectFilterInput
{
	public function __construct(
		public ?EntityIdentifierIDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?NullableStringComparatorInput $customIdentifier = null,
		public ?StringComparatorInput $state = null,
		public ?ProjectStatusFilterInput $status = null,
		public ?NullableNumberComparatorInput $priority = null,
		public ?ProjectLabelCollectionFilterInput $labels = null,
		public ?ContentComparatorInput $searchableContent = null,
		public ?NullableDateComparatorInput $startedAt = null,
		public ?NullableDateComparatorInput $completedAt = null,
		public ?NullableDateComparatorInput $canceledAt = null,
		public ?NullableDateComparatorInput $startDate = null,
		public ?NullableDateComparatorInput $targetDate = null,
		public ?StringComparatorInput $health = null,
		public ?StringComparatorInput $healthWithAge = null,
		public ?StringComparatorInput $activityType = null,
		public ?RelationExistsComparatorInput $hasRelatedRelations = null,
		public ?RelationExistsComparatorInput $hasDependedOnByRelations = null,
		public ?RelationExistsComparatorInput $hasDependsOnRelations = null,
		public ?RelationExistsComparatorInput $hasBlockedByRelations = null,
		public ?RelationExistsComparatorInput $hasBlockingRelations = null,
		public ?RelationExistsComparatorInput $hasViolatedRelations = null,
		public ?ProjectUpdatesCollectionFilterInput $projectUpdates = null,
		public ?UserFilterInput $creator = null,
		public ?NullableUserFilterInput $lead = null,
		public ?UserCollectionFilterInput $members = null,
		public ?IssueCollectionFilterInput $issues = null,
		public ?RoadmapCollectionFilterInput $roadmaps = null,
		public ?InitiativeCollectionFilterInput $initiatives = null,
		public ?ProjectMilestoneCollectionFilterInput $projectMilestones = null,
		public ?ProjectMilestoneCollectionFilterInput $completedProjectMilestones = null,
		public ?ProjectMilestoneFilterInput $nextProjectMilestone = null,
		public ?TeamCollectionFilterInput $accessibleTeams = null,
		public ?NullableTeamFilterInput $leadTeam = null,
		public ?NullableTemplateFilterInput $lastAppliedTemplate = null,
		public ?CustomerNeedCollectionFilterInput $needs = null,
		public ?NumberComparatorInput $customerCount = null,
		public ?NumberComparatorInput $customerImportantCount = null,
		/** @var iterable<ProjectFilterInput>|Collection<int, ProjectFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectFilterInput>|Collection<int, ProjectFilterInput> */
		public ?iterable $or = null
	) {
	}
}
