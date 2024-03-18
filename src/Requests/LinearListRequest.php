<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearListResponse;

class LinearListRequest extends LinearRequest
{
	protected ?string $response = LinearListResponse::class;
}
