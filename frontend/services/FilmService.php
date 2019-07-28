<?php
namespace frontend\services;
use frontend\repositories\FilmRepository;
use yii\helpers\ArrayHelper;

class FilmService
{

    public $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function getSlugById($filmId): string
    {
        return ArrayHelper::getValue($this->filmRepository->getSlugById($filmId), '0.slug');
    }

}
