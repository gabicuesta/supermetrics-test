<?php

declare(strict_types = 1);

namespace Tests\unit;

use PHPUnit\Framework\TestCase;
use Statistics\Calculator\NoopCalculator;

/**
 * Class ATestTest
 *
 * @package Tests\unit
 */
class TestTest extends TestCase
{
    /**
     * @test
     */
    public function testNothing(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     * We test testDoCalculate method from NoopCalculator
     */
    public function testDoCalculate()
    {
        $statistics = new NoopCalculator();
        $statistics->numPosts = 30;
        $statistics->authors = [1, 2, 3];
        $result = $statistics->doCalculate();
        $this->assertEquals(10, $result->getValue());
    }
}
