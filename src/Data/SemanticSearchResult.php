<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\SemanticSearchResultType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SemanticSearchResult */
class SemanticSearchResult extends Data implements Node
{
	public function __construct(public Optional|string $id, public Optional|SemanticSearchResultType $type, public Optional|Issue|null $issue, public Optional|Project|null $project, public Optional|Initiative|null $initiative, public Optional|Document|null $document)
	{
	}
}
