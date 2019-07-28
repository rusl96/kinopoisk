<?php
namespace frontend\services;
use frontend\repositories\FilmProducerActorRepository;
use yii\helpers\ArrayHelper;

class FilmProducerActorService
{

    public $filmProducerActorRepository;

    public function __construct(FilmProducerActorRepository $filmProducerActorRepository)
    {
        $this->filmProducerActorRepository = $filmProducerActorRepository;
    }

    public function getFilmIdAsConditionToQueryByProducerActorId($producerActorId)
    {
        return ArrayHelper::getColumn($this->filmProducerActorRepository->getFilmIdsByProducerActorId($producerActorId), 'film_id');
    }

}
