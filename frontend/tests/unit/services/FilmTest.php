<?php

namespace common\tests\unit\services;

use Codeception\Test\Unit;
use common\fixtures\FilmFixture;
use frontend\services\FilmService;
use Yii;


/**
 * Login form test
 */
class FilmTest extends Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    protected $filmService;
    protected $film;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->filmService = Yii::createObject(FilmService::class);
    }

    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'film' => [
                'class' => FilmFixture::class,
                'dataFile' => codecept_data_dir() . 'film.php',
            ],
        ];
    }

    public function testGetSlugById()
    {
        $this->film = $this->tester->grabFixture('film', '0');
        $this->assertEquals($this->film->slug, $this->filmService->getSlugById(1));
    }

    public function testGetIdAsConditionToQueryByProducerId()
    {
        $this->assertEquals([1,2,3], $this->filmService->getIdAsConditionToQueryByProducerId(1));
    }

}
