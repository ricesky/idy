<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\RatingValue;

class RatingValueTest extends TestCase
{
    public function testCanBeInstantiated() : void
    {
        $ratingValue = new RatingValue(0);

        $this->assertInstanceOf(RatingValue::class, $ratingValue);
    }

    public function testValueCanHandleZero() : void 
    {
        $ratingValue = new RatingValue(0);

        $this->assertEquals(0, $ratingValue->value());
    }

    public function testExceptionThrownOnMinus() : void 
    {
        $this->expectException(InvalidArgumentException::class);

        $ratingValue = new RatingValue(-1);
    }

    public function testValueCanHandleFive() : void 
    {
        $ratingValue = new RatingValue(5);

        $this->assertEquals(5, $ratingValue->value());
    }

    public function testExceptionThrownOnValueSix() : void 
    {
        $this->expectException(InvalidArgumentException::class);

        $ratingValue = new RatingValue(6);
    }
    
}