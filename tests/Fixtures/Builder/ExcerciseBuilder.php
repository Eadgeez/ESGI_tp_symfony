<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Chapter;
use App\Entity\Comment;
use App\Entity\Question;
use App\Tests\Fixtures\Factory\ExcerciseFactory;

class ExcerciseBuilder implements BuilderInterface
{
    private ?Chapter $chapter = null;
    private ?int $excerciseNumber = null;
    private ?Question $question = null;
    private ?Comment $comment = null;

    public function withChapter(Chapter $chapter): self
    {
        $this->chapter = $chapter;
        return $this;
    }

    public function withExcerciseNumber(int $excerciseNumber): self
    {
        $this->excerciseNumber = $excerciseNumber;
        return $this;
    }

    public function withQuestion(Question $question): self
    {
        $this->question[] = $question;
        return $this;
    }

    public function withComment(Comment $comment): self
    {
        $this->comment[] = $comment;
        return $this;
    }

    public function build(bool $persist = true): Excercise
    {
        $excercise = ExcerciseFactory::createOne(array_filter([
            'chapter' => $this->chapter,
            'excercise_number' => $this->excerciseNumber,
            'questions' => $this->questions,
            'comments' => $this->comments,
        ]));

        if ($persist) {
            $excercise->_save();
        }

        return $excercise->_real();
    }
}