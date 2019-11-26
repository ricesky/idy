<?php 

namespace Idy\Idea\Infrastructure;

use Phalcon\DiInterface;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\Author;
use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\Rating;
use Idy\Idea\Domain\Model\RatingId;
use Idy\Idea\Domain\Model\RatingValue;

class SqlIdeaRepository implements IdeaRepository
{
    protected $di;

    public function __construct(DiInterface $di) 
    {
        $this->di = $di;
    }

    public function byId(IdeaId $id) : ?Idea
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT id, title, description, 
                        author_name, author_email,
                        rating, vote
                FROM idea 
                WHERE id = :id";

        $result = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'id' => $id->id()
        ]);

        if ($result) {

            $author = new Author(
                $result['author_name'],
                $result['author_email']
            );

            $idea = new Idea(
                new IdeaId($result['id']),
                $result['title'],
                $result['description'],
                $author,
                $result['rating'],
                $result['vote']
            );

            $sql = "SELECT id, rate, rater_email, idea_id
                FROM rating 
                WHERE idea_id = :idea_id";

            $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
                'idea_id' => $id->id()
            ]);
            
            foreach($result as $row) {
                $idea->addRating(
                    new RatingId($row['id']), 
                    $row['rater_email'],
                    new RatingValue($row['rate'])
                );
            }

            return $idea;
        }

        return null;
    }

    public function all() : ?array
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT id, title, description, 
                        author_name, author_email,
                        rating, vote
                FROM idea";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);

        if ($result) {

            $resultArray = array();

            foreach($result as $row) {
                $author = new Author(
                    $row['author_name'],
                    $row['author_email']
                );
    
                $idea = new Idea(
                    new IdeaId($row['id']),
                    $row['title'],
                    $row['description'],
                    $author,
                    $row['rating'],
                    $row['vote']
                );

                array_push($resultArray, $idea);
            }

            return $resultArray;
        }

        return null;
    }

    public function save(Idea $idea)
    {
        $db = $this->di->getShared('db');

        $sql = "INSERT INTO idea(
                    id, title, description, author_name, 
                    author_email, rating, vote
                ) VALUES(
                    :id, :title, :description, :author_name, 
                    :author_email, :rating, :vote
                )";

        $result = $db->query($sql, [
            'id' => $idea->id()->id(),
            'title' => $idea->title(),
            'description' => $idea->description(),
            'author_name' => $idea->author()->name(), 
            'author_email' => $idea->author()->email(), 
            'rating' => $idea->averageRating(), 
            'vote' => $idea->totalVotes()
        ]);
    }
    
}