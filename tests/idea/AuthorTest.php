<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\Author;

class AuthorTest extends TestCase
{

    public function testCanBeInstantiated() : void
    {
        $author = new Author("John Doe", "john.doe@mail.com");

        $this->assertInstanceOf(Author::class, $author);
    }

    public function testCanReturnFormattedString() : void
    {
        $author = new Author("John Doe", "john.doe@mail.com");

        $expected = 'John Doe - john.doe@mail.com';

        $this->assertEquals($expected, $author->toString());
    }
    
}