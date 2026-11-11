<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Tests\TestCase;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ClientCredentialsTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();

		MockClient::destroyGlobal();

		config([
			'linearavel.api_key' => null,
			'linearavel.client_id' => 'client-id',
			'linearavel.client_secret' => 'client-secret',
		]);
	}

	public function test_it_signs_in_as_the_app_with_a_client_credentials_token(): void
	{
		MockClient::global([
			GetClientCredentialsTokenRequest::class => $this->token('app-token'),
			LinearRequest::class => $this->viewer(),
		]);

		$this->assertSame('app-user', linear()->viewer()->get('id')->id);

		$this->assertSaloonSent(fn(Request $request) => $request instanceof GetClientCredentialsTokenRequest
			&& 'client_credentials' === $request->body()->get('grant_type')
			&& 'client-id' === $request->body()->get('client_id')
			&& 'client-secret' === $request->body()->get('client_secret')
			&& 'read,write' === $request->body()->get('scope'));

		$this->assertSaloonSent(fn(Request $request, Response $response) => $request instanceof LinearRequest
			&& 'Bearer app-token' === $response->getPendingRequest()->headers()->get('Authorization'));
	}

	public function test_the_token_is_reused_for_later_requests(): void
	{
		MockClient::global([
			GetClientCredentialsTokenRequest::class => $this->token('app-token'),
			LinearRequest::class => $this->viewer(),
		]);

		linear()->viewer()->get('id');
		linear()->viewer()->get('id');

		MockClient::getGlobal()->assertSentCount(1, GetClientCredentialsTokenRequest::class);
		MockClient::getGlobal()->assertSentCount(2, LinearRequest::class);
	}

	public function test_a_rejected_token_is_replaced_and_the_request_is_sent_again(): void
	{
		MockClient::global([
			$this->token('revoked-token'),
			MockResponse::make(['errors' => [['message' => 'Authentication required, not authenticated', 'extensions' => ['code' => 'AUTHENTICATION_ERROR']]]], 401),
			$this->token('new-token'),
			$this->viewer(),
		]);

		$this->assertSame('app-user', linear()->viewer()->get('id')->id);

		$this->assertSaloonSent(fn(Request $request, Response $response) => $request instanceof LinearRequest
			&& $response->successful()
			&& 'Bearer new-token' === $response->getPendingRequest()->headers()->get('Authorization'));
	}

	public function test_a_rejected_client_secret_is_not_retried(): void
	{
		MockClient::global([
			GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => 'invalid_client'], 401),
		]);

		try {
			linear()->viewer()->get('id');
			$this->fail('Expected the token request to fail.');
		} catch (RequestException) {
		}

		MockClient::getGlobal()->assertSentCount(1, GetClientCredentialsTokenRequest::class);
	}

	public function test_a_personal_api_key_is_sent_without_a_bearer_prefix(): void
	{
		config(['linearavel.api_key' => 'lin_api_key', 'linearavel.client_id' => null]);

		MockClient::global([LinearRequest::class => $this->viewer()]);

		linear()->viewer()->get('id');

		$this->assertSaloonSent(fn(Request $request, Response $response) => 'lin_api_key' === $response->getPendingRequest()->headers()->get('Authorization'));
	}

	protected function token(string $access_token): MockResponse
	{
		return MockResponse::make([
			'access_token' => $access_token,
			'token_type' => 'Bearer',
			'expires_in' => 2591999,
			'scope' => 'read write',
		]);
	}

	protected function viewer(): MockResponse
	{
		return MockResponse::make(['data' => ['viewer' => ['id' => 'app-user']]]);
	}
}
