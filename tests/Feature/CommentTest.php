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

        $this->commentContainer->addComment(new Comment(1, 0));

        for($i = 2; $i <= 1000; $i++) {
            $this->commentContainer->addComment(new Comment($i, random_int(0, 9)));
        }

        for ($i = 1; $i < 1000; $i++) {
            $comment = $this->commentContainer->getComment($i);
            $level = $comment->getLevel();
            $id = $comment->getNumber();
            if ($level > 0) {
                for ($j = 0; $j < $id; $j++) {
                    $commentParent = $this->commentContainer->getComment($j);

                    if ($commentParent->getLevel() + 1 == $level) {
                        $comment->setParent($commentParent->getNumber());
                        $this->commentContainer->changeComment($comment, $i);
                        break;
                    }
                }
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
