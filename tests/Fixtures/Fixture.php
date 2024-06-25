<?php

namespace Glhd\Linearavel\Tests\Fixtures;

use Saloon\Data\RecordedResponse;

class Fixture extends \Saloon\Http\Faking\Fixture
{
	protected function defineSensitiveRegexPatterns(): array
	{
		return [
			'/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i' => 'redacted@mailinator.com',
			'/[0-9a-fA-F]{8}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{12}/' => '00000000-0000-0000-0000-000000000000',
			'/[a-z0-9]{100,}/i' => 'redacted',
		];
	}
	
	protected function beforeSave(RecordedResponse $recordedResponse): RecordedResponse
	{
		$headers = [
			'Content-Length', // no longer accurate
			'CF-Ray',
			'x-request-id',
			'Set-Cookie',
		];
		
		foreach ($headers as $header) {
			if (isset($recordedResponse->headers[$header])) {
				unset($recordedResponse->headers[$header]);
			}
		}
		
		return $recordedResponse;
	}
}
