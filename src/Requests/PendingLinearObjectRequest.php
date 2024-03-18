<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Responses\LinearObjectResponse;
use Spatie\LaravelData\Data;

/**
 * @template TDataImpl of Data
 * @extends PendingLinearRequest<TDataImpl>
 */
class PendingLinearObjectRequest extends PendingLinearRequest
{
	/**
	 * @param string ...$fields
	 * @return LinearObjectResponse<TDataImpl>
	 */
	public function get(string ...$fields)
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
