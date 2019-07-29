<?php
namespace frontend\services;
use common\entities\ProducerActor;
use frontend\repositories\ProducerActorRepository;
use yii\helpers\ArrayHelper;

class ProducerActorService
{

    public $producerActorRepository;
    private $filmProducerActorService;
    private $filmService;

    public function __construct(ProducerActorRepository $producerActorRepository, FilmProducerActorService $filmProducerActorService, FilmService $filmService)
    {
        $this->producerActorRepository = $producerActorRepository;
        $this->filmProducerActorService = $filmProducerActorService;
        $this->filmService = $filmService;
    }

    public function getSlugById($filmId): string
    {
        return ArrayHelper::getValue($this->producerActorRepository->getSlugById($filmId), '0.slug');
    }

    public function getFilmIdsAsConditionToQueryByProducerActorId(ProducerActor $producerActor)
    {
        if  ($producerActor->function == ProducerActor::FUNCTION_ACTOR) {
            $filmIds = $this->filmProducerActorService->getFilmIdAsConditionToQueryByProducerActorId($producerActor->id);
        } elseif ($producerActor->function == ProducerActor::FUNCTION_PRODUCER) {
            $filmIds = $this->filmService->getIdAsConditionToQueryByProducerId($producerActor->id);
        }
        return $filmIds;
    }

}
