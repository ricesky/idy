<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\Rating;
use \Idy\Idea\Domain\Model\RatingId;
use \Idy\Idea\Domain\Model\RatingValue;
use \Idy\Idea\Domain\Model\IdeaId;

class RatingTest extends TestCase
{
    public function testCanBeInstantiated() : void
    {
        $rating = new Rating(
            new RatingId(),
            'rizky@if.its.ac.id',
            new RatingValue(4),
            new IdeaId()
        );

        $this->assertInstanceOf(Rating::class, $rating);
    }

    public function testCanBeCompared() : void
    {
        $ideaId = new IdeaId();

        $rating1 = new Rating(
            new RatingId(),
            'rizky@if.its.ac.id',
            new RatingValue(4),
            $ideaId
        );

        $rating2 = new Rating(
            new RatingId(),
            'rizky@if.its.ac.id',
            new RatingValue(5),
            $ideaId
        );

        $this->assertTrue($rating1->equals($rating2));
    }

    
}