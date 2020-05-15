<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Comment\Comment;
use App\Comment\Sorter;
use App\Comment\CommentContainer;

class CommentTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->commentContainer = new CommentContainer();

        for($i = 1; $i <= 1000; $i++) {

            $id1 = random_int(1, 10000);
            $id2 = random_int(1, 10000);
            $level1 = random_int(0, 8);
            $level2 = $level1 + 1;

            if ($id1 = $id2) $id2 += 1;

            if ($id1 < $id2) {
                $comment1 = new Comment($id1, $level1);
                $comment2 = new Comment($id2, $level2);

                $this->commentContainer->addComment($comment1);
                $this->commentContainer->addComment($comment2);
            } else {
                $comment1 = new Comment($id2, $level1);
                $comment2 = new Comment($id1, $level2);

                $this->commentContainer->addComment($comment1);
                $this->commentContainer->addComment($comment2);
            }
        }

        $this->commentContainer->setMaxLevel(9);

        $this->comments = $this->commentContainer->getComments();
    }    

    public function testSortRootCommentsWithAllLevelsChild()
    {
        $rootLevel = $this->commentContainer->getRootComments();

        $sorter = new Sorter();
        $sortedRootComments = $sorter->sortComments($rootLevel);

        $result = [];

        foreach ($sortedRootComments as $comment) {
            array_push($result, $comment);

            $childComments = $this->commentContainer->getAllLevelChildComments($comment);

            foreach ($childComments as $child) {
                array_push($result, $child);
            }
        }

        dd(count($result));
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
