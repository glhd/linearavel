<?php

namespace Glhd\Linearavel\Tests\Support;

/**
 * A line diff that stops early.
 *
 * PHPUnit's differ weighs every line of one document against every line of the
 * other, which takes minutes on documents the size of the Linear schema. This
 * walks both sides once, re-syncs over short runs of added or removed lines,
 * and gives up after a few hunks — enough to name what drifted, cheap enough
 * to print straight away.
 */
class BoundedDiff
{
	/** Lines that have to line up again before a hunk is considered closed. */
	protected const SYNC_LINES = 3;
	
	public function __construct(
		protected int $max_hunks = 5,
		protected int $context = 2,
		protected int $window = 50,
		protected int $max_lines_per_side = 10,
	) {
	}
	
	/** Describe the first few places two documents diverge. */
	public function describe(string $expected, string $actual): string
	{
		$expected_lines = explode("\n", $expected);
		$actual_lines = explode("\n", $actual);
		
		$expected_count = count($expected_lines);
		$actual_count = count($actual_lines);
		
		$hunks = [];
		$note = null;
		$i = 0;
		$j = 0;
		
		while ($i < $expected_count || $j < $actual_count) {
			if (($expected_lines[$i] ?? null) === ($actual_lines[$j] ?? null)) {
				$i++;
				$j++;
				continue;
			}
			
			if (count($hunks) >= $this->max_hunks) {
				$note = sprintf('More differences follow, starting at expected line %s.', number_format($i + 1));
				break;
			}
			
			$alignment = $this->realign($expected_lines, $actual_lines, $i, $j);
			
			if (null === $alignment) {
				$hunks[] = $this->hunk($expected_lines, $actual_lines, $i, $j, $this->window, $this->window);
				$note = "The two documents never line up again within {$this->window} lines, so the rest was not compared.";
				break;
			}
			
			[$removed, $added] = $alignment;
			
			$hunks[] = $this->hunk($expected_lines, $actual_lines, $i, $j, $removed, $added);
			
			$i += $removed;
			$j += $added;
		}
		
		if ([] === $hunks) {
			return 'The two documents contain the same lines.';
		}
		
		$header = sprintf(
			'%d difference(s) (expected %s lines, actual %s lines):',
			count($hunks),
			number_format($expected_count),
			number_format($actual_count)
		);
		
		$body = implode("\n\n", $hunks);
		
		return null === $note
			? $header."\n\n".$body
			: $header."\n\n".$body."\n\n".$note;
	}
	
	/**
	 * Find the nearest point at which both sides line up again, searching no
	 * further than the window. Returns the lines to drop from each side.
	 *
	 * @return array{int, int}|null
	 */
	protected function realign(array $expected, array $actual, int $i, int $j): ?array
	{
		for ($distance = 1; $distance <= $this->window; $distance++) {
			for ($offset = 0; $offset <= $distance; $offset++) {
				// Lines removed from the expected side…
				if ($this->linesUp($expected, $actual, $i + $distance, $j + $offset)) {
					return [$distance, $offset];
				}
				
				// …and lines added to the actual side
				if ($this->linesUp($expected, $actual, $i + $offset, $j + $distance)) {
					return [$offset, $distance];
				}
			}
		}
		
		return null;
	}
	
	/** Do both sides carry the same lines from here on (or run out together)? */
	protected function linesUp(array $expected, array $actual, int $i, int $j): bool
	{
		for ($offset = 0; $offset < static::SYNC_LINES; $offset++) {
			$left = $expected[$i + $offset] ?? null;
			$right = $actual[$j + $offset] ?? null;
			
			if (null === $left && null === $right) {
				return true;
			}
			
			if ($left !== $right) {
				return false;
			}
		}
		
		return true;
	}
	
	/** Render one hunk, with line numbers and a little context either side. */
	protected function hunk(array $expected, array $actual, int $i, int $j, int $removed, int $added): string
	{
		$lines = [sprintf('@@ expected line %s, actual line %s @@', number_format($i + 1), number_format($j + 1))];
		
		foreach (array_slice($expected, max(0, $i - $this->context), min($i, $this->context)) as $line) {
			$lines[] = '  '.$line;
		}
		
		foreach ($this->body($expected, $i, $removed) as $line) {
			$lines[] = $line;
		}
		
		foreach ($this->body($actual, $j, $added, '+') as $line) {
			$lines[] = $line;
		}
		
		foreach (array_slice($expected, $i + $removed, $this->context) as $line) {
			$lines[] = '  '.$line;
		}
		
		return implode("\n", $lines);
	}
	
	/** @return array<int, string> */
	protected function body(array $source, int $from, int $count, string $marker = '-'): array
	{
		$count = min($count, max(0, count($source) - $from));
		$shown = min($count, $this->max_lines_per_side);
		
		$lines = array_map(
			fn($line) => $marker.' '.$line,
			array_slice($source, $from, $shown)
		);
		
		if ($count > $shown) {
			$lines[] = $marker.' ... '.number_format($count - $shown).' more line(s)';
		}
		
		return $lines;
	}
}
