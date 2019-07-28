<?php
namespace frontend\repositories;

use common\entities\ProducerActor;

class ProducerActorRepository extends IRepository
{

    public function __construct(ProducerActor $producerActor)
    {
        $this->type = $producerActor;
    }

    public function getColumnsBy(array $columns, array $condition): array
    {
        return $this->getColumnsFromBy($columns, $condition, 'producer_actor');
    }

    public function getColumnsById(array $columns, array $producerActorId): array
    {
        return $this->getColumnsBy($columns, ['id' => $producerActorId]);
    }

    public function getSlugById(int $producerActorId): array
    {
        return $this->getColumnsById(['slug'], [$producerActorId]);
    }

}
