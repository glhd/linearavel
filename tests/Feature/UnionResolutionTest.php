<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Contracts\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Data\Enums\OrganizationInviteStatus;
use Glhd\Linearavel\Data\OrganizationAcceptedOrExpiredInviteDetailsPayload;
use Glhd\Linearavel\Data\OrganizationInviteFullDetailsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Tests\TestCase;
use RuntimeException;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class UnionResolutionTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();
		
		MockClient::destroyGlobal();
	}
	
	public function test_union_members_implement_the_union_interface(): void
	{
		$this->assertTrue(is_a(OrganizationInviteFullDetailsPayload::class, OrganizationInviteDetailsPayload::class, true));
		$this->assertTrue(is_a(OrganizationAcceptedOrExpiredInviteDetailsPayload::class, OrganizationInviteDetailsPayload::class, true));
	}
	
	public function test_it_queries_union_members_with_inline_fragments(): void
	{
		MockClient::global([
			MockResponse::make([
				'data' => [
					'organizationInviteDetails' => [
						'__typename' => 'OrganizationInviteFullDetailsPayload',
						'organizationName' => 'InterNACHI',
					],
				],
			], 200),
		]);
		
		app(LinearConnector::class)->organizationInviteDetails('abc')->get();
		
		$this->assertSaloonSent(function(LinearRequest $request) {
			$query = $request->body()->all()['query'];
			
			return str_contains($query, '__typename')
				&& str_contains($query, '... on OrganizationInviteFullDetailsPayload {')
				&& str_contains($query, '... on OrganizationAcceptedOrExpiredInviteDetailsPayload {');
		});
	}
	
	public function test_it_resolves_a_union_to_the_member_named_by_typename(): void
	{
		MockClient::global([
			MockResponse::make([
				'data' => [
					'organizationInviteDetails' => [
						'__typename' => 'OrganizationAcceptedOrExpiredInviteDetailsPayload',
						'status' => 'expired',
					],
				],
			], 200),
		]);
		
		$details = app(LinearConnector::class)->organizationInviteDetails('abc')->get();
		
		$this->assertInstanceOf(OrganizationAcceptedOrExpiredInviteDetailsPayload::class, $details);
		$this->assertSame(OrganizationInviteStatus::expired, $details->status);
	}
	
	public function test_it_complains_when_typename_is_missing(): void
	{
		MockClient::global([
			MockResponse::make(['data' => ['organizationInviteDetails' => ['status' => 'expired']]], 200),
		]);
		
		$this->expectException(RuntimeException::class);
		$this->expectExceptionMessage('__typename');
		
		app(LinearConnector::class)->organizationInviteDetails('abc')->get();
	}
}
