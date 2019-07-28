<?php
namespace frontend\repositories;
use common\entities\FilmProducerActor;
use yii\helpers\ArrayHelper;

class FilmProducerActorRepository extends IRepository
{

    public function __construct(FilmProducerActor $filmProducerActor)
    {
        $this->type = $filmProducerActor;
    }

    public function getColumnsBy(array $columns, array $condition): array
    {
        return $this->getColumnsFromBy($columns, $condition, 'film_producer_actor');
    }

    public function getProducerActorIdsByFilmId($filmId)
    {
        return $this->getColumnsBy(['producer_actor_id'], ['film_id' => $filmId]);
    }

    public function getFilmIdsByProducerActorId($producerActorId)
    {
        return $this->getColumnsBy(['film_id'], ['producer_actor_id' => $producerActorId]);
    }

}
