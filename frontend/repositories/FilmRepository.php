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
        return $this->getColumnsBy($columns, ['id' => $filmId]);
    }

    public function getColumnsByProducerId(array $columns, int $producerId): array
    {
        return $this->getColumnsBy($columns, ['producer_id' => $producerId]);
    }

    public function getIdsByProducerId(int $producerId): array
    {
        return $this->getColumnsByProducerId(['id'], $producerId);
    }

    public function getSlugById(int $filmId): array
    {
        return $this->getColumnsById(['slug'], [$filmId]);
    }

}
