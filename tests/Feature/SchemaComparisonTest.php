<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\CodeGeneration\SchemaComparison;
use Glhd\Linearavel\Tests\TestCase;

class SchemaComparisonTest extends TestCase
{
	public function test_an_unchanged_schema_needs_no_release(): void
	{
		$comparison = SchemaComparison::between($this->schema(), $this->schema());
		
		$this->assertFalse($comparison->changed());
		$this->assertSame(SchemaComparison::NONE, $comparison->bump());
		$this->assertSame('No schema changes.', $comparison->summary());
	}
	
	public function test_a_new_field_is_a_patch(): void
	{
		$comparison = SchemaComparison::between($this->schema(), $this->schema(extra_issue_field: 'estimate: Int'));
		
		$this->assertTrue($comparison->changed());
		$this->assertSame(SchemaComparison::PATCH, $comparison->bump());
		$this->assertTrue($comparison->breaking()->isEmpty());
	}
	
	public function test_a_removed_field_is_a_minor_bump(): void
	{
		$comparison = SchemaComparison::between($this->schema(), $this->schema(drop_title: true));
		
		$this->assertSame(SchemaComparison::MINOR, $comparison->bump());
		$this->assertTrue($comparison->breaking()->contains(fn($change) => str_contains($change, 'Issue.title')));
		$this->assertStringContainsString('Removed or narrowed', $comparison->summary());
	}
	
	public function test_a_newly_required_argument_is_a_minor_bump(): void
	{
		$comparison = SchemaComparison::between($this->schema(), $this->schema(extra_query_arg: 'teamId: String!'));
		
		$this->assertSame(SchemaComparison::MINOR, $comparison->bump());
	}
	
	public function test_a_new_enum_value_is_reported_as_additive(): void
	{
		$comparison = SchemaComparison::between($this->schema(), $this->schema(extra_enum_value: 'urgent'));
		
		$this->assertSame(SchemaComparison::PATCH, $comparison->bump());
		$this->assertTrue($comparison->additive()->contains(fn($change) => str_contains($change, 'urgent')));
	}
	
	protected function schema(
		?string $extra_issue_field = null,
		?string $extra_query_arg = null,
		?string $extra_enum_value = null,
		bool $drop_title = false,
	): string {
		$issue_fields = array_filter([
			'id: ID!',
			$drop_title ? null : 'title: String!',
			'priority: Priority',
			$extra_issue_field,
		]);
		
		$enum_values = array_filter(['low', 'high', $extra_enum_value]);
		
		$query_args = array_filter(['id: String!', $extra_query_arg]);
		
		return implode("\n", [
			'type Query {',
			'  issue('.implode(', ', $query_args).'): Issue',
			'}',
			'',
			'type Issue {',
			'  '.implode("\n  ", $issue_fields),
			'}',
			'',
			'enum Priority {',
			'  '.implode("\n  ", $enum_values),
			'}',
		]);
	}
}
