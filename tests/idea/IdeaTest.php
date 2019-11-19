<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\Idea;

class IdeaTest extends TestCase
{

    public function testCanBeInstantiated() : void
    {
        $idea = Idea::makeIdea("my idea", "my description", "the author");

        $this->assetEquals('my idea', $idea->title());
        $this->assetEquals('my description', $idea->description());
        $this->assetEquals('the author', $idea->author());
    }
    
}