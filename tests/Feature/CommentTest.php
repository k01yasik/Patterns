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

        $this->comment1 = new Comment(1, 0);
        $this->comment2 = new Comment(2, 0);
        $this->comment3 = new Comment(3, 1);
        $this->comment4 = new Comment(4, 1);
        $this->comment9 = new Comment(9, 1);
        $this->comment10 = new Comment(10, 1);
        $this->comment5 = new Comment(5, 2);
        $this->comment7 = new Comment(7, 2);
        $this->comment6 = new Comment(6, 3);
        $this->comment8 = new Comment(8, 3);
        $this->comment11 = new Comment(11, 0);

        $this->comment1->addChilds([
            $this->comment3,
            $this->comment4,
            $this->comment9,
            $this->comment10
        ]);
        $this->comment4->addChilds([
            $this->comment5,
            $this->comment7,
        ]);
        $this->comment5->addChilds([
            $this->comment6,
            $this->comment8,
        ]);

        $this->commentContainer = new CommentContainer();
        $this->commentContainer->addComment($this->comment1);
        $this->commentContainer->addComment($this->comment2);
        $this->commentContainer->addComment($this->comment3);
        $this->commentContainer->addComment($this->comment4);
        $this->commentContainer->addComment($this->comment5);
        $this->commentContainer->addComment($this->comment6);
        $this->commentContainer->addComment($this->comment7);
        $this->commentContainer->addComment($this->comment8);
        $this->commentContainer->addComment($this->comment9);
        $this->commentContainer->addComment($this->comment10);
        $this->commentContainer->addComment($this->comment11);

        $this->comments = $this->commentContainer->getComments();
    }

    public function testSortRootComments()
    {        
        $firstLevel = $this->commentContainer->getCommentsByLevel(0);

        $sorter = new Sorter();
        $sortedRootComments = $sorter->sortComments($firstLevel);

        $this->assertEquals(1, $sortedRootComments[0]->getNumber());
        $this->assertEquals(2, $sortedRootComments[1]->getNumber());
        $this->assertEquals(11, $sortedRootComments[2]->getNumber());
    }

    public function testSortRootCommentsWithChild()
    {
        $rootLevel = $this->commentContainer->getCommentsByLevel(0);

        $sorter = new Sorter();
        $sortedRootComments = $sorter->sortComments($rootLevel);

        $result = [];

        foreach ($sortedRootComments as $comment)
        {
            array_push($result, $comment);

            if ($comment->hasChild()) {                
                $childComments = $comment->getChilds();
                $sortedChildComments = $sorter->sortComments($childComments);
                foreach ($sortedChildComments as $childComment) {
                    array_push($result, $childComment);
                }
            }
        }

        $this->assertEquals(1, $result[0]->getNumber());
        $this->assertEquals(4, $result[2]->getNumber());
        $this->assertEquals(10, $result[4]->getNumber());
        $this->assertEquals(11, $result[6]->getNumber());
    }

    public function testSortRootCommentsWith2LevelsChild()
    {
        $rootLevel = $this->commentContainer->getCommentsByLevel(0);

        $sorter = new Sorter();
        $sortedRootComments = $sorter->sortComments($rootLevel);

        $result = [];

        foreach ($sortedRootComments as $comment)
        {
            array_push($result, $comment);

            if ($comment->hasChild()) {                
                $childComments = $comment->getChilds();
                $sortedChildComments = $sorter->sortComments($childComments);
                foreach ($sortedChildComments as $childComment) {
                    array_push($result, $childComment);

                    if ($childComment->hasChild()) {
                        $childComments_2 = $childComment->getChilds();
                        $sortedChildComments_2 = $sorter->sortComments($childComments_2);
                        foreach ($sortedChildComments_2 as $childComment_2) {
                            array_push($result, $childComment_2);
                        }
                    }
                }
            }
        }

        $this->assertEquals(5, $result[3]->getNumber());
        $this->assertEquals(9, count($result));
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
