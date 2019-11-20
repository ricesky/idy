<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\Idea;
use \Idy\Idea\Domain\Model\Author;

class IdeaTest extends TestCase
{

    public function testCanBeInstantiated() : void
    {
        $author = new Author("John Doe", "john.doe@mail.com");
        $idea = Idea::makeIdea("my idea", "my description", $author);

        $this->assertEquals("my idea", $idea->title());
        $this->assertEquals("my description", $idea->description());
        $this->assertEquals($author, $idea->author());
    }
    
}