<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SalesforceMetadataIntegrationComparator */
class SalesforceMetadataIntegrationComparatorInput
{
	public function __construct(public ?string $caseMetadata = null)
	{
	}
}
