<?php
namespace frontend\repositories;
use common\entities\Genre;

class GenreRepository extends IRepository
{

    public function __construct(Genre $genre)
    {
        $this->type = $genre;
    }

}
