<?php
namespace frontend\services;
use frontend\repositories\GenreRepository;

class GenreService
{

    public $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

}
