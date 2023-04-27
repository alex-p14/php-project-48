<?php

namespace Difference\Calculator\Tests;

use PHPUnit\Framework\TestCase;
use function Difference\Calculator\Differ\genDiff;

class DifferTest extends TestCase
{
    public function testDiffer(): void
    {
        $this->assertEquals(
            <<<EOD
            {
              - follow: false
                host: hexlet.io
              - proxy: 123.234.53.22
              - timeout: 50
              + timeout: 20
              + verbose: true
            }
            EOD,
             gendiff('./tests/file1.json', './tests/file2.json')
            );
    }
}