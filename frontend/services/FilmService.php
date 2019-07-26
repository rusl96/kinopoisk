<?php
namespace frontend\services;
use frontend\repositories\FilmRepository;

class FilmService
{

    public $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

}
