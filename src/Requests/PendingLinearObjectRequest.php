<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearObjectResponse;
use Spatie\LaravelData\Data;

/**
 * @template T of Data
 */
class PendingLinearObjectRequest extends PendingLinearRequest
{
	/**
	 * @param string ...$fields
	 * @return \Glhd\Linearavel\Responses\LinearObjectResponse<T>
	 */
	public function get(string ...$fields): LinearObjectResponse
	{
		$query = $this->query->withFields($fields);
		
		$request = new LinearObjectRequest((string) $query);
		
		return $this->connector
			->send($request)
			->withConfiguration(
				name: $this->name,
				class: $this->class,
			);
	}
}
