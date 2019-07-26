<?php
namespace frontend\services;
use frontend\repositories\FilmGenreRepository;
use yii\helpers\ArrayHelper;

class FilmGenreService
{

    public $filmGenreRepository;

    public function __construct(FilmGenreRepository $filmGenreRepository)
    {
        $this->filmGenreRepository = $filmGenreRepository;
    }

    public function getGenreIdAsConditionToQueryByFilmId($filmId)
    {
        return ArrayHelper::getColumn($this->filmGenreRepository->getGenreIdsByFilmId($filmId), 'genre_id');
    }

    public function getFilmsIdLikeThis($filmId)
    {
        $genres = $this->getGenreIdAsConditionToQueryByFilmId($filmId);
        $genresCount = count($genres);
        $filmIds = $this->filmGenreRepository->getFilmIdsByGenreId($genres);
        $filmIds = array_count_values(ArrayHelper::getColumn($filmIds, 'film_id'));
        unset($filmIds[$filmId]);
        $result = NULL;
        foreach ($filmIds as $key => $value) {
            if($value == $genresCount) {
                $result[] = $key;
            }
        }
        return $result;
    }


}
