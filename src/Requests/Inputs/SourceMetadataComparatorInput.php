<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SourceMetadataComparator */
class SourceMetadataComparatorInput
{
	public function __construct(public ?bool $null = null, public ?SubTypeComparatorInput $subType = null, public ?WorkflowDefinitionIdComparatorInput $workflowDefinitionId = null, public ?SalesforceMetadataIntegrationComparatorInput $salesforceMetadata = null)
	{
	}
}
