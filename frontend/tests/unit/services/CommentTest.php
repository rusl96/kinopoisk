<?php

namespace common\tests\unit\services;

use Codeception\Test\Unit;
use common\entities\Comment;
use frontend\services\CommentService;
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
    protected $commentService;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->commentService = Yii::createObject(CommentService::class);
    }

    public function testNewCommentWithAttribute()
    {
        $comment = $this->commentService->newCommentWithAttribute('content', 'yes');
        /** @var Comment $comment */
        $this->assertEquals('yes', $comment->content);
    }

    public function testNewCommentWithFilmId()
    {
        $comment = $this->commentService->newCommentWithFilmId(1);
        /** @var Comment $comment */
        $this->assertEquals(1, $comment->film_id);
    }

    public function testNewCommentWithProducerActorId()
    {
        $comment = $this->commentService->newCommentWithProducerActorId(1);
        /** @var Comment $comment */
        $this->assertEquals(1, $comment->producer_actor_id);
    }



}
