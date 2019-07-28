<?php
namespace frontend\services;
use frontend\repositories\ProducerActorRepository;
use yii\helpers\ArrayHelper;

class ProducerActorService
{

    public $producerActorRepository;

    public function __construct(ProducerActorRepository $producerActorRepository)
    {
        $this->producerActorRepository = $producerActorRepository;
    }

    public function getSlugById($filmId): string
    {
        return ArrayHelper::getValue($this->producerActorRepository->getSlugById($filmId), '0.slug');
    }

}
