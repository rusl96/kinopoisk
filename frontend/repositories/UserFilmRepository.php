<?php
namespace frontend\repositories;
use common\entities\UserFilm;

class UserFilmRepository extends IRepository
{

    public function __construct(UserFilm $userFilm)
    {
        $this->type = $userFilm;
    }

    public function getColumnsBy(array $columns, array $condition): array
    {
        return $this->getColumnsFromBy($columns, $condition, 'user_film');
    }
    public function getFilmIdsByUserId($userId)
    {
        return $this->getColumnsBy(['film_id'], ['user_id' => $userId]);
    }
}
