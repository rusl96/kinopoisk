<?php
namespace frontend\repositories;
use common\entities\FilmGenre;
use yii\helpers\ArrayHelper;

class FilmGenreRepository extends IRepository
{

    public function __construct(FilmGenre $filmGenre)
    {
        $this->type = $filmGenre;
    }

    public function getGenreIdsByFilmId($filmId)
    {
        return $this->getColumnsFromBy(['genre_id'], ['film_id' => $filmId], 'film_genre');
    }

    public function getFilmIdsByGenreId($genreId)
    {
        return $this->getColumnsFromBy(['film_id'], ['genre_id' => $genreId], 'film_genre');
    }

}
