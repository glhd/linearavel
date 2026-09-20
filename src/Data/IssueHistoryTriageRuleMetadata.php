<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueHistoryTriageRuleMetadata */
class IssueHistoryTriageRuleMetadata extends Data
{
	public function __construct(public Optional|IssueHistoryTriageRuleError|null $triageRuleError, public Optional|WorkflowDefinition|null $updatedByTriageRule)
	{
	}
}
