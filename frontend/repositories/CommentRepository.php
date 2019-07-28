<?php
namespace frontend\repositories;
use common\entities\Comment;
use yii\web\NotFoundHttpException;

class CommentRepository extends IRepository
{

    public function __construct()
    {
        $this->type = new Comment();
    }

    public function getAllRootCommentsWithFilmId($filmId)
    {
        try {
            $result = $this->getSome(['parent_id' => NULL, 'film_id' => $filmId]);
        } catch (NotFoundHttpException $e) {
            $result = NULL;
        }
        return $result;
    }


}
