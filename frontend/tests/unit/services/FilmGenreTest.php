<?php

namespace common\tests\unit\services;

use Codeception\Test\Unit;
use common\fixtures\FilmGenreFixture;
use frontend\services\FilmGenreService;
use Yii;


/**
 * Login form test
 */
class FilmGenreTest extends Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    protected $filmGenreService;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->filmGenreService = Yii::createObject(FilmGenreService::class);
    }

    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'filmGenre' => [
                'class' => FilmGenreFixture::class,
                'dataFile' => codecept_data_dir() . 'filmGenre.php'
            ],

        ];
    }

    public function testGetGenreIdAsConditionToQueryByFilmId()
    {
        $this->assertEquals([1,2,3], $this->filmGenreService->getGenreIdAsConditionToQueryByFilmId(1));
    }

    public function testGetGenreIdAsConditionToQueryByFilmIds()
    {
        $this->assertEquals([1,2,3], $this->filmGenreService->getGenreIdAsConditionToQueryByFilmIds([1,2,3]));
    }

    public function testGetFilmsIdLikeThis()
    {
        $this->assertEquals([2,3], $this->filmGenreService->getFilmsIdLikeThis(1));
    }

}
