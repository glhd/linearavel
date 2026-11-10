<?php

namespace Glhd\Linearavel\Connectors;

use Illuminate\Support\Facades\Cache;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;
use Saloon\Traits\Plugins\AcceptsJson;

class LinearOAuthConnector extends Connector
{
	use AcceptsJson;
	use ClientCredentialsGrant;

	/** @param array<int, string> $scopes */
	public function __construct(
		protected string $client_id,
		protected string $client_secret,
		protected array $scopes,
	) {
	}

	public function resolveBaseUrl(): string
	{
		return 'https://api.linear.app';
	}

	public function accessToken(): string
	{
		if ($token = Cache::get($this->cacheKey())) {
			return $token;
		}

		$authenticator = $this->getAccessToken($this->scopes, ',');

		Cache::put($this->cacheKey(), $authenticator->getAccessToken(), $authenticator->getExpiresAt()?->modify('-1 hour'));

		return $authenticator->getAccessToken();
	}

	public function forgetAccessToken(): void
	{
		Cache::forget($this->cacheKey());
	}

	protected function defaultOauthConfig(): OAuthConfig
	{
		return OAuthConfig::make()
			->setClientId($this->client_id)
			->setClientSecret($this->client_secret)
			->setTokenEndpoint('/oauth/token');
	}

	protected function cacheKey(): string
	{
		return 'linearavel:access-token:'.sha1($this->client_id.'|'.implode(',', $this->scopes));
	}
}
