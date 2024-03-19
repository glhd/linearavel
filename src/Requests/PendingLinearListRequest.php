<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearListResponse;
use Spatie\LaravelData\Data;

/**
 * @template TPendingData of Data
 * @extends PendingLinearRequest<TPendingData>
 */
class PendingLinearListRequest extends PendingLinearRequest
{
	/**
	 * @param string ...$fields
	 * @return \Glhd\Linearavel\Responses\LinearListResponse<TPendingData>
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
	
	/** @return \Illuminate\Support\Collection<int, TPendingData> */
	public function resolve(string ...$fields)
	{
		return $this->get(...$fields)->resolve();
	}
}
