<?php
namespace frontend\services;
use common\entities\Comment;
use frontend\repositories\CommentRepository;

class CommentService
{

    public $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function newCommentWithAttribute(string $columnName, $value)
    {
        $comment = new Comment();
        $comment->{$columnName} = $value;
        return $comment;
    }

    public function newCommentWithFilmId($filmId)
    {
        return $this->newCommentWithAttribute('film_id', $filmId);
    }

    public function newCommentWithProducerActorId($producerActorId)
    {
        return $this->newCommentWithAttribute('producer_actor_id', $producerActorId);
    }


}
