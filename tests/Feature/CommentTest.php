<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Comment\Comment;
use App\Comment\Sorter;
use App\Comment\CommentContainer;
use Carbon\Carbon;

class CommentTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->commentContainer = new CommentContainer();

        $this->commentContainer->addComment(new Comment(0, 0));

        for($i = 1; $i < 100; $i++) {
            $this->commentContainer->addComment(new Comment($i, random_int(0, 3)));
        }

        for ($i = 1; $i < 100; $i++) {
            $comment = $this->commentContainer->getComment($i);
            $level = $comment->getLevel();
            $id = $comment->getNumber();
            if ($level > 0) {
                $maxLevel = 0;
                $parentId = 0;

                for ($j = 0; $j < $id; $j++) {
                    $commentParent = $this->commentContainer->getComment($j);

                    $commentParentLevel = $commentParent->getLevel();
                    $commentParentNumber = $commentParent->getNumber();

                    if ($commentParentLevel > $maxLevel) {
                        $maxLevel = $commentParentLevel;
                        $parentId = $commentParentNumber;
                    }

                    if ($commentParentLevel + 1 == $level) {
                        $comment->setParent($commentParentNumber);
                        $this->commentContainer->changeComment($comment, $i);
                        break;
                    }
                }

                if (is_null($comment->getParent())) {
                    $comment->setParent($parentId);
                    $comment->setLevel($maxLevel + 1);
                    $this->commentContainer->changeComment($comment, $i);
                }
            }
        }

        $this->commentContainer->setMaxLevel(4);

        $this->comments = $this->commentContainer->getComments();

        //file_put_contents('result.txt', print_r($this->comments, true));
    }

    public function testSortRootCommentsWithAllLevelsChild()
    {
        $result = [];

        $rootLevel = $this->commentContainer->getRootComments();

        $sorter = new Sorter();
        $sortedRootComments = $sorter->sortComments($rootLevel);

        foreach ($sortedRootComments as $comment) {
            $result[] = $comment;

            $childComments = $this->commentContainer->getAllLevelChildComments($comment);

            foreach ($childComments as $child) {
                $result[] = $child;
            }
        }

        $this->assertEquals(100, count($result));
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
