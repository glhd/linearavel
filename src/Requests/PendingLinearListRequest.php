<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearListResponse;
use Spatie\LaravelData\Data;

/**
 * @template T of Data
 */
class PendingLinearListRequest extends PendingLinearRequest
{
	/**
	 * @param string ...$fields
	 * @return \Glhd\Linearavel\Responses\LinearListResponse<T>
	 */
	public function get(string ...$fields): LinearListResponse
	{
		$query = $this->query->withFields($fields);
		
		$request = new LinearListRequest((string) $query);
		
		return $this->connector
			->send($request)
			->withConfiguration(
				name: $this->name,
				class: $this->class,
			);
	}
}
