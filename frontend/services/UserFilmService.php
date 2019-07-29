<?php
namespace frontend\services;
use common\entities\UserFilm;
use frontend\repositories\UserFilmRepository;
use Yii;
use yii\helpers\ArrayHelper;

class UserFilmService
{

    public $userFilmRepository;

    public function __construct(UserFilmRepository $userFilmRepository)
    {
        $this->userFilmRepository = $userFilmRepository;
    }

    public function addNewUserFilm(int $userId, int $filmId)
    {
        $newUserFilm = new UserFilm();
        $newUserFilm->user_id = $userId;
        $newUserFilm->film_id = $filmId;
        if (!$newUserFilm->save()) {
            Yii::$app->session->setFlash('danger', "Вы уже добавляли фильм в избранное!");
        } else {
            Yii::$app->session->setFlash('success', "Фильм добавлен в избранное.");
        }
    }

    public function getFilmIdAsConditionToQueryByUserId($userId): array
    {
        return ArrayHelper::getColumn($this->userFilmRepository->getFilmIdsByUserId($userId), 'film_id');
    }

}
