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
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

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

    public function withCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function withUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function withDeletedAt(\DateTimeImmutable $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function build(bool $persist = true): object
    {
        $excercise = ExcerciseFactory::createOne(array_filter([
            'chapter' => $this->chapter,
            'excercise_number' => $this->excerciseNumber,
            'questions' => $this->question,
            'comments' => $this->comment,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $excercise->_save();
        }

        return $excercise->_real();
    }
}