<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Type\Introspection;
use GraphQL\Utils\BuildClientSchema;
use GraphQL\Utils\SchemaPrinter;
use Illuminate\Http\Client\Factory;
use RuntimeException;

/**
 * Reads the live Linear schema and writes it back out as SDL, so that the
 * generated code can be rebuilt whenever Linear changes their API.
 */
class SchemaFetcher
{
	public function __construct(
		protected string $api_key,
		protected string $base_url = 'https://api.linear.app/graphql',
		protected ?Factory $http = null,
	) {
		$this->http ??= new Factory();
	}

	/** Fetch the live schema and return it as SDL. */
	public function sdl(): string
	{
		return static::print(BuildClientSchema::build($this->introspect()));
	}

	/** Print a schema in the canonical form we keep in the repository. */
	public static function print($schema): string
	{
		return SchemaPrinter::doPrint($schema);
	}

	/** @return array<string, mixed> */
	protected function introspect(): array
	{
		$response = $this->http
			->baseUrl($this->base_url)
			->withHeader('Authorization', $this->api_key)
			->asJson()
			->timeout(120)
			->retry(3, 2000, throw: false)
			->post('/', [
				'query' => Introspection::getIntrospectionQuery([
					'descriptions' => true,
					'directiveIsRepeatable' => true,
					'specifiedByURL' => true,
				]),
			]);

		if ($response->failed()) {
			throw new RuntimeException("Introspection failed with status {$response->status()}: {$response->body()}");
		}

		$json = $response->json();

		if (isset($json['errors'])) {
			throw new RuntimeException('Introspection returned errors: '.json_encode($json['errors']));
		}

		if (! isset($json['data']['__schema'])) {
			throw new RuntimeException('Introspection returned no schema.');
		}

		return $json['data'];
	}
}
