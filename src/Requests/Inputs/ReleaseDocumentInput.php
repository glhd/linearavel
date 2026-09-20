<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseDocumentInput */
class ReleaseDocumentInput
{
	public function __construct(public string $title, public string $content)
	{
	}
}
