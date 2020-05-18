<?php
namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

class MyMathHelperTest extends TestCase
{

    public function testMathAddPositive()
    {
        $result = mathAdd(10, 5);
        $this->assertEquals(15, $result);
    }

    /**
     * this method to prove that naming convention can be ignored
     * as long as there is @test annotation, but this method is not recomended
     *
     * please see PHPUnit section annotations
     * https://phpunit.readthedocs.io/en/9.0/annotations.html
     *
     * @test
     */
    public function mathAddNegative()
    {
        $this->expectWarning();
        mathAdd("sepuluh", "lima");
    }

    public function testMathAddWeird()
    {
        $result = mathAdd("10", "5");
        $this->assertEquals(15, $result);
    }

    public function testMathSubtractPositive()
    {
        $result = mathSubtract(10, 5);
        $this->assertEquals(5, $result);

    }

}
