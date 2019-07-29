<?php
namespace frontend\services;
use common\entities\Film;
use frontend\repositories\UserRepository;
use yii\data\ActiveDataProvider;

class UserService
{

    public $userRepository;
    private $filmService;
    private $userFilmService;

    public function __construct(UserRepository $userRepository, FilmService $filmService, UserFilmService $userFilmService)
    {
        $this->userRepository = $userRepository;
        $this->filmService = $filmService;
        $this->userFilmService = $userFilmService;

    }

    public function createFavoriteFilmDataProviderByUserId($userId)
    {
        $filmIds = $this->userFilmService->getFilmIdAsConditionToQueryByUserId($userId);
        $query = Film::find()->where(['id' => $filmIds]);
        return new ActiveDataProvider(['query' => $query]);
    }

}
