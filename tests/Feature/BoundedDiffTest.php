<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Tests\Support\BoundedDiff;
use Glhd\Linearavel\Tests\TestCase;

class BoundedDiffTest extends TestCase
{
	public function test_it_reports_nothing_when_both_documents_match(): void
	{
		$document = implode("\n", ['one', 'two', 'three']);
		
		$this->assertSame(
			'The two documents contain the same lines.',
			(new BoundedDiff())->describe($document, $document)
		);
	}
	
	public function test_it_names_the_changed_line_and_where_it_is(): void
	{
		$expected = implode("\n", ['one', 'two', 'three', 'four', 'five']);
		$actual = implode("\n", ['one', 'two', 'THREE', 'four', 'five']);
		
		$described = (new BoundedDiff())->describe($expected, $actual);
		
		$this->assertStringContainsString('@@ expected line 3, actual line 3 @@', $described);
		$this->assertStringContainsString('- three', $described);
		$this->assertStringContainsString('+ THREE', $described);
		$this->assertStringContainsString('1 difference(s)', $described);
	}
	
	public function test_it_lines_the_documents_up_again_after_an_insertion(): void
	{
		$expected = implode("\n", ['one', 'two', 'three', 'four', 'five', 'six']);
		$actual = implode("\n", ['one', 'two', 'extra', 'three', 'four', 'five', 'six']);
		
		$described = (new BoundedDiff())->describe($expected, $actual);
		
		// An inserted line shifts everything after it, so a diff that can't re-sync
		// would report every remaining line as changed
		$this->assertStringContainsString('1 difference(s)', $described);
		$this->assertStringContainsString('+ extra', $described);
		$this->assertStringNotContainsString('- three', $described);
	}
	
	public function test_it_stops_after_the_hunk_limit(): void
	{
		$lines = range(1, 200);
		$expected = implode("\n", array_map(fn($line) => "line {$line}", $lines));
		$actual = implode("\n", array_map(fn($line) => 0 === $line % 10 ? "changed {$line}" : "line {$line}", $lines));
		
		$described = (new BoundedDiff(max_hunks: 3))->describe($expected, $actual);
		
		$this->assertSame(3, substr_count($described, '@@ expected line'));
		$this->assertStringContainsString('More differences follow, starting at expected line 40.', $described);
	}
	
	public function test_it_gives_up_when_the_documents_never_line_up_again(): void
	{
		$expected = implode("\n", array_map(fn($line) => "left {$line}", range(1, 300)));
		$actual = implode("\n", array_map(fn($line) => "right {$line}", range(1, 300)));
		
		$described = (new BoundedDiff(window: 20))->describe($expected, $actual);
		
		$this->assertStringContainsString('never line up again within 20 lines', $described);
		$this->assertStringContainsString('- left 1', $described);
		$this->assertStringContainsString('+ right 1', $described);
		$this->assertStringContainsString('more line(s)', $described);
	}
	
	public function test_it_describes_long_documents_quickly(): void
	{
		$lines = array_map(fn($line) => "line {$line}", range(1, 40_000));
		$expected = implode("\n", $lines);
		
		$lines[2] = 'changed';
		$actual = implode("\n", $lines);
		
		$start = microtime(true);
		$described = (new BoundedDiff())->describe($expected, $actual);
		$elapsed = microtime(true) - $start;
		
		$this->assertStringContainsString('+ changed', $described);
		
		// A diff that weighs every line against every other takes minutes on a
		// document this long, which is the whole reason this class exists
		$this->assertLessThan(5, $elapsed, "Describing two 40,000 line documents took {$elapsed} seconds.");
	}
}
