<?php 

namespace Idy\Idea\Infrastructure;

use Phalcon\DiInterface;

use Idy\Idea\Domain\Model\RatingRepository;
use Idy\Idea\Domain\Model\Rating;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\RatingId;
use Idy\Idea\Domain\Model\RatingValue;

class SqlRatingRepository implements RatingRepository
{
    protected $di;

    public function __construct(DiInterface $di) 
    {
        $this->di = $di;
    }

    public function save(Rating $rating)
    {
        $db = $this->di->getShared('db');

        $sql = "INSERT INTO rating(
                    id, rate, rater_email, idea_id
                ) VALUES(
                    :id, :rate, :rater_email, :idea_id
                )";

        $result = $db->query($sql, [
            'id' => $rating->id()->id(),
            'rate' => $rating->value()->value(),
            'rater_email' => $rating->email(),
            'idea_id' => $rating->ideaId()->id()
        ]);
    }
    
    public function id() : ?RatingId
    {
        return $this->id;
    }

    public function email()
    {
        return $this->email;
    }

    public function value() : RatingValue
    {
        return $this->value;
    }

}