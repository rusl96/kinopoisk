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

    public function newCommentWithFilmId($filmId)
    {
        $comment = new Comment();
        $comment->film_id = $filmId;
        return $comment;
    }


}
