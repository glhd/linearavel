<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\InitiativeTab;
use Glhd\Linearavel\Data\Enums\PipelineTab;
use Glhd\Linearavel\Data\Enums\ProjectTab;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Favorite */
class Favorite extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|User $owner,
		public Optional|float $sortOrder,
		public Optional|FavoriteConnection $children,
		public Optional|string $title,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Favorite|null $parent,
		public Optional|string|null $folderName,
		public Optional|string|null $liveFolderPreset,
		public Optional|string|null $liveFolderDefinition,
		public Optional|ProjectTab|null $projectTab,
		public Optional|string|null $predefinedViewType,
		public Optional|InitiativeTab|null $initiativeTab,
		public Optional|PipelineTab|null $pipelineTab,
		public Optional|Issue|null $issue,
		public Optional|Project|null $project,
		public Optional|Facet|null $facet,
		public Optional|Team|null $projectTeam,
		public Optional|Cycle|null $cycle,
		public Optional|CustomView|null $customView,
		public Optional|Team|null $predefinedViewTeam,
		public Optional|Document|null $document,
		public Optional|Initiative|null $initiative,
		public Optional|IssueLabel|null $label,
		public Optional|ProjectLabel|null $projectLabel,
		public Optional|InitiativeLabel|null $initiativeLabel,
		public Optional|User|null $user,
		public Optional|Customer|null $customer,
		public Optional|Dashboard|null $dashboard,
		public Optional|PullRequest|null $pullRequest,
		public Optional|AiConversation|null $aiConversation,
		public Optional|Release|null $release,
		public Optional|ReleasePipeline|null $releasePipeline,
		public Optional|ReleaseNote|null $releaseNote,
		public Optional|Team|null $team,
		public Optional|WorkflowDefinition|null $workflowDefinition,
		public Optional|string|null $url,
		public Optional|string|null $detail,
		public Optional|string|null $color,
		public Optional|string|null $icon
	) {
	}
}
