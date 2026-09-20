<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Type\Schema;
use GraphQL\Utils\BreakingChangesFinder;
use GraphQL\Utils\BuildSchema;
use Illuminate\Support\Collection;

/**
 * Compares two versions of the Linear schema and works out how much the release
 * that follows it should move: nothing, a patch, or a minor version.
 */
class SchemaComparison
{
	public const NONE = 'none';

	public const PATCH = 'patch';

	public const MINOR = 'minor';

	public static function between(string $old_sdl, string $new_sdl): static
	{
		return new static(
			BuildSchema::build($old_sdl, options: ['assumeValid' => true]),
			BuildSchema::build($new_sdl, options: ['assumeValid' => true]),
			$old_sdl === $new_sdl,
		);
	}

	public function __construct(
		protected Schema $old,
		protected Schema $new,
		protected bool $identical,
	) {
	}

	/** Did the schema change at all? */
	public function changed(): bool
	{
		return ! $this->identical;
	}

	/**
	 * Anything Linear took away or made stricter. These change the shape of the
	 * generated code in ways that can break callers.
	 *
	 * @return Collection<int, string>
	 */
	public function breaking(): Collection
	{
		return $this->describe(BreakingChangesFinder::findBreakingChanges($this->old, $this->new));
	}

	/**
	 * Things Linear added. New enum values and union members are listed here too,
	 * because they widen types that callers may be matching on exhaustively.
	 *
	 * @return Collection<int, string>
	 */
	public function additive(): Collection
	{
		return $this->describe(BreakingChangesFinder::findDangerousChanges($this->old, $this->new));
	}

	/** Which part of the version number should move: `none`, `patch` or `minor`. */
	public function bump(): string
	{
		if (! $this->changed()) {
			return static::NONE;
		}

		return $this->breaking()->isNotEmpty()
			? static::MINOR
			: static::PATCH;
	}

	/** A short markdown summary, for release notes. */
	public function summary(): string
	{
		if (! $this->changed()) {
			return 'No schema changes.';
		}

		$lines = [];

		if ($this->breaking()->isNotEmpty()) {
			$lines[] = '### Removed or narrowed';
			$lines[] = '';
			$lines = [...$lines, ...$this->breaking()->map(fn($change) => "- {$change}")->all()];
			$lines[] = '';
		}

		if ($this->additive()->isNotEmpty()) {
			$lines[] = '### Added or widened';
			$lines[] = '';
			$lines = [...$lines, ...$this->additive()->map(fn($change) => "- {$change}")->all()];
			$lines[] = '';
		}

		if (! count($lines)) {
			$lines[] = 'The schema changed, but only in ways that do not affect the generated types.';
		}

		return trim(implode("\n", $lines));
	}

	/**
	 * @param array<int, array{type: string, description: string}> $changes
	 * @return Collection<int, string>
	 */
	protected function describe(array $changes): Collection
	{
		return collect($changes)
			->map(fn(array $change) => $change['description'])
			->sort()
			->values();
	}
}
