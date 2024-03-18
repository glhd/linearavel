<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearObjectResponse;

class LinearObjectRequest extends LinearRequest
{
	protected ?string $response = LinearObjectResponse::class;
}
