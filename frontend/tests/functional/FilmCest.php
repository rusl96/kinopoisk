<?php
namespace frontend\tests\functional;

use common\fixtures\FilmFixture;
use common\fixtures\FilmGenreFixture;
use common\fixtures\FilmProducerActorFixture;
use common\fixtures\GenreFixture;
use common\fixtures\MpaaFixture;
use common\fixtures\ProducerActorFixture;
use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;

/* @var $scenario \Codeception\Scenario */

class FilmCest
{
    public function _fixtures()
    {
        return [
            'film' => [
                'class' => FilmFixture::class,
                'dataFile' => codecept_data_dir() . 'film.php',
            ],
            'filmGenre' => [
                'class' => FilmGenreFixture::class,
                'dataFile' => codecept_data_dir() . 'filmGenre.php'
            ],
            'filmProducerActor' => [
                'class' => FilmProducerActorFixture::class,
                'dataFile' => codecept_data_dir() . 'filmProducerActor.php'
            ],
            'genre' => [
                'class' => GenreFixture::class,
                'dataFile' => codecept_data_dir() . 'genre.php'
            ],
            'mpaa' => [
                'class' => MpaaFixture::class,
                'dataFile' => codecept_data_dir() . 'mpaa.php'
            ],
            'producerActor' => [
                'class' => producerActorFixture::class,
                'dataFile' => codecept_data_dir() . 'producerActor.php'
            ],
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ],

        ];
    }
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['film/index']);
    }

    public function checkFilms(FunctionalTester $I)
    {
        $I->see('Films', 'h1');
        $I->seeElement('img', ['src' => 'https://st.kp.yandex.net/images/film_iphone/iphone360_64187.jpg']);
    }

    public function checkThisFilm(FunctionalTester $I)
    {
        $I->see('Saw II');
        $I->click('Saw II');
        $I->see('Saw II', 'h1');
        $I->seeElement('img', ['src' => 'https://st.kp.yandex.net/images/film_iphone/iphone360_86206.jpg']);
    }

    public function checkFilmsGenre(FunctionalTester $I)
    {
        $I->see('Thriller');
        $I->click('Thriller');
        $I->see('Thriller', 'h1');
    }

    public function checkFilmsProducer(FunctionalTester $I)
    {
        $I->see('Saw');
        $I->click('Saw');
        $I->see('James Wan');
        $I->click('James Wan');
        $I->see('James Wan', 'h1');
    }

    public function checkFilmsActors(FunctionalTester $I)
    {
        $I->see('Saw III');
        $I->click('Saw III');
        $I->see('Leigh Whannell');
        $I->click('Leigh Whannell');
        $I->see('Leigh Whannell', 'h1');
    }

}
