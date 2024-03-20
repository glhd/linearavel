<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearObjectResponse;
use Spatie\LaravelData\Data;

/**
 * @template TPendingData of Data
 * @extends PendingLinearRequest<TPendingData>
 */
class PendingLinearObjectRequest extends PendingLinearRequest
{
	/** @return TPendingData */
	public function get(string ...$fields)
	{
		return $this->response(...$fields)->resolve();
	}
	
	/** @return LinearObjectResponse<TPendingData> */
	public function response(string ...$fields)
	{
		$query = $this->query->withFields($fields);
		
		$request = new LinearObjectRequest((string) $query);
		
		return $this->connector
			->send($request)
			->throw()
			->withConfiguration(
				name: $this->name,
				class: $this->class,
			);
	}
}
