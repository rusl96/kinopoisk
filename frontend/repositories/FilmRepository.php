<?php
namespace frontend\repositories;
use common\entities\Film;

class FilmRepository extends IRepository
{

    public function __construct(Film $film)
    {
        $this->type = $film;
    }

    public function getColumnsBy(array $columns, array $condition): array
    {
        return $this->getColumnsFromBy($columns, $condition, 'film');
    }

    public function getColumnsById(array $columns, array $filmId): array
    {
        return $this->getColumnsFromBy($columns, ['id' => $filmId], 'film');
    }

    public function getPromoOfFilmsById($film_id)
    {
        return $this->getColumnsById(['name', 'slug', 'image_url'], $film_id);
    }
}
