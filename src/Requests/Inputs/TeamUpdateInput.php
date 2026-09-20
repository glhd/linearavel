<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\IssueSharingPolicy;
use Glhd\Linearavel\Data\Enums\ProductIntelligenceScope;
use Glhd\Linearavel\Data\Enums\TeamRetirementSubTeamHandling;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamUpdateInput */
class TeamUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $key = null, public ?string $icon = null, public ?string $color = null, public ?bool $cyclesEnabled = null, public ?float $cycleStartDay = null, public ?int $cycleDuration = null, public ?int $cycleCooldownTime = null, public ?bool $cycleIssueAutoAssignStarted = null, public ?bool $cycleIssueAutoAssignCompleted = null, public ?bool $cycleLockToActive = null, public ?DateTimeInterface $cycleEnabledStartDate = null, public ?float $upcomingCycleCount = null, public ?string $timezone = null, public ?bool $issueOrderingNoPriorityFirst = null, public ?bool $inheritIssueEstimation = null, public ?string $issueEstimationType = null, public ?bool $issueEstimationAllowZero = null, public ?string $setIssueSortOrderOnStateChange = null, public ?bool $issueEstimationExtended = null, public ?float $defaultIssueEstimate = null, public ?bool $slackNewIssue = null, public ?bool $slackIssueComments = null, public ?bool $slackIssueStatuses = null, public ?bool $groupIssueHistory = null, public ?bool $aiThreadSummariesEnabled = null, public ?bool $aiDiscussionSummariesEnabled = null, public ?string $defaultTemplateForMembersId = null, public ?string $defaultTemplateForNonMembersId = null, public ?string $defaultProjectTemplateId = null, public ?bool $private = null, public ?bool $triageEnabled = null, public ?bool $requirePriorityToLeaveTriage = null, public ?string $defaultIssueStateId = null, public ?float $autoClosePeriod = null, public ?string $autoCloseStateId = null, public ?bool $autoCloseParentIssues = null, public ?bool $autoCloseChildIssues = null, public ?float $autoArchivePeriod = null, public ?string $markedAsDuplicateWorkflowStateId = null, public ?bool $joinByDefault = null, public ?bool $scimManaged = null, public ?string $scimGroupName = null, public ?string $parentId = null, public ?bool $inheritWorkflowStatuses = null, public ?bool $inheritProjectStatuses = null, public ?bool $inheritProductIntelligenceScope = null, public ?ProductIntelligenceScope $productIntelligenceScope = null, public ?bool $issueSharingEnabled = null, public ?bool $initiativesEnabled = null, public ?IssueSharingPolicy $issueSharingPolicy = null, public ?bool $inheritSlackAutoCreateProjectChannel = null, public ?bool $slackAutoCreateProjectChannel = null, public ?TeamSecuritySettingsInput $securitySettings = null, public ?bool $allMembersCanJoin = null, public ?DateTimeInterface $retiredAt = null, public ?TeamRetirementSubTeamHandling $handleSubTeamsOnRetirement = null)
	{
	}
}
