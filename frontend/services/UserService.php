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
/** todo Разберись с query почему не работает метод из IPepository */
    public function createFavoriteFilmDataProviderByUserId($userId)
    {
        $filmIds = $this->userFilmService->getFilmIdAsConditionToQueryByUserId($userId);
        $query = $this->filmService->filmRepository->makeQueryByIds($filmIds);
        $query = Film::find()->where(['id' => $filmIds]);
        return new ActiveDataProvider(['query' => $query]);
    }

}
